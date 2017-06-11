<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Group;
use SharedGroup;
use Item;
use User;
use Team;
use TeamMember;
use Auth;

class GroupController extends Controller
{

	public function show($id)
    {
    	session(['currentGroup' => $id]);
		session(['currentTeam' => 0]);
	    $currentGroup = Group::find($id);
		$currentGroup->privileges = Group::checkPrivileges($currentGroup);
		$groups = $currentGroup->groups();
		foreach ($groups as $group) {
			$group->privileges = $currentGroup->privileges;
		}
		$sharedGroups = $currentGroup->sharedGroups();
		$groups = $groups->merge($sharedGroups);

        $items = $currentGroup->items();
        $sharedItems = $currentGroup->sharedItems();
        foreach($sharedItems as $itemType => $collection){
        	foreach($collection as $sharedItem){
	        	array_push($items[$itemType], $sharedItem);
        	}
        }
    	return view('home', array('groups'=>$groups, 'currentGroup'=>$currentGroup, 'items'=>$items));
    }

	public function store()
    {
		$user = Auth::user();
    	$currentGroupId = session('currentGroup');
    	$group = new Group;
    	$group->name = Input::get('name');
    	$group->id_parent = $currentGroupId;
		$group->id_owner = $user->id;
		$group->save();
        return back();
    }

	public function update($id)
    {
    	$group = Group::find($id);
    	$group->name = Input::get('name');
		$group->save();
        return back();
    }

	public function delete($id)
    {
		$user = Auth::user();
		$group = Group::find($id);
		if ($group->id_owner == $user->id){
			$group->id_parent = $user->id_trash_group;
			$group->save();
		}else{
			$conditions = ['id_user' => $user->id, 'id_group' => $id];
			$sharedGroup = SharedGroup::where($conditions)->first();
			$sharedGroup->id_parent = $user->id_trash_group;
			$sharedGroup->save();
		}
		return back();
    }

    public function restore($id)
    {
		$user = Auth::user();
    	$group = Group::find($id);
		if ($group->id_owner == $user->id){
			$group->id_parent = $user->id_home_group;
			$group->save();
		}else{
			$conditions = ['id_user' => $user->id, 'id_item' => $id];
			$sharedItem = SharedGroup::where($conditions)->first();
			$sharedItem->id_parent = $user->id_home_group;
			$sharedItem->save();
		}
        return back();
    }

    public function move()
    {
		$user = Auth::user();
    	$group = Group::find(Input::get('group_id'));
		if ($group->id_owner == $user->id){
			$group->id_parent = Input::get('group');
	    	$group->save();
		}else{
			$conditions = ['id_user' => $user->id, 'id_group' => $group->id];
			$sharedGroup = SharedGroup::where($conditions)->first();
			$sharedGroup->id_parent = Input::get('group');
			$sharedGroup->save();
		}
    	return back();
    }

    public function share()
    {
		$currentUser = Auth::user();
    	$group = Group::find(Input::get('group_id'));
    	$privileges = Input::get('privileges');

		$teamId = Input::get('team');
		if (!empty($teamId)){
			$team = Team::find($teamId);
			$teamMembers = $team->members();
			$emails = array();
			foreach ($teamMembers as $user) {
				if ($user->email != $currentUser->email){
					$emails[] = $user->email;					
				}
			}
		}else{
			$input = Input::get('emails');
	    	$emails = preg_split( "/[\s,;]+/", $input );
		}

    	foreach($emails as $email){
    		$user = User::where('email', $email)->first();
    		$sharedGroup = new SharedGroup;
    		$sharedGroup->name = $group->name;
    		$sharedGroup->id_parent = $user->id_shared_group;
    		$sharedGroup->id_group = $group->id;
    		$sharedGroup->id_owner = Auth::user()->id;
    		$sharedGroup->id_user = $user->id;
    		$sharedGroup->privileges = $privileges;
    		$sharedGroup->save();
    	}

    	return back();
    }
}
