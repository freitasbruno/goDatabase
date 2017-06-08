<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Group;
use SharedGroup;
use Item;
use User;
use Team;
use Auth;

class GroupController extends Controller
{

	public function index($id)
    {
    	$user = auth::user();
    	$home = Group::find($user->id_home_group);
    	$home->privileges = 'owner';
		$shared = Group::find($user->id_shared_group);
		$trash = Group::find($user->id_trash_group);
		$pin = Group::find($user->id_pins_group);
		$teamsGroup = Team::find($user->id_teams_group);

		$userGroups = array(
			'home' => $home,
			'shared' => $shared,
			'trash' => $trash,
			'pins' => $pin
		);

    	session(['currentGroup' => $id]);
	    $currentGroup = Group::find($id);
	    if (Group::topParent($currentGroup)->id == $user->id_home_group){
	    	$currentGroup->privileges = 'owner';
	    }

		$groups = $currentGroup->groups();
		$sharedGroups = $currentGroup->sharedGroups();
		$groups = $groups->merge($sharedGroups);

        $items = $currentGroup->items();
        $sharedItems = $currentGroup->sharedItems();

        foreach($sharedItems as $itemType => $collection){
        	foreach($collection as $sharedItem){
	        	array_push($items[$itemType], $sharedItem);
        	}
        }

    	return view('home', array('groups'=>$groups, 'userGroups'=>$userGroups, 'teamsGroup'=>$teamsGroup, 'currentGroup'=>$currentGroup, 'items'=>$items));
    }

	public function create()
    {
    	$currentGroupId = session('currentGroup');
    	$group = new Group;
    	$group->name = Input::get('name');
    	$group->id_parent = $currentGroupId;
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
    	$group = Group::destroy($id);
        return back();
    }

    public function move()
    {
    	$group = Group::find(Input::get('group_id'));
    	$group->id_parent = Input::get('group');
    	$group->save();
    	return back();
    }

    public function share()
    {

    	$group = Group::find(Input::get('group_id'));
    	$privileges = Input::get('privileges');
    	$input = Input::get('emails');
    	$emails = preg_split( "/[\s,;]+/", $input );

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
