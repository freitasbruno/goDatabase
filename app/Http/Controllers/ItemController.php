<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use User;
use Item;
use Group;
use AppAddress;
use AppEmail;
use AppPhone;
use AppTask;
use AppTextfield;
use AppWebsite;
use SharedItem;
use DB;
use Auth;
use Team;

class ItemController extends Controller
{
	public function create()
    {
		$user = Auth::user();
    	$currentGroupId = session('currentGroup');
    	$item = new Item;
    	$item->name = Input::get('name');
    	$item->type = Item::$types[Input::get('type')];
    	$item->id_parent = $currentGroupId;
		$item->id_owner = $user->id;
		$item->save();
        return back();
    }

	public function update($id)
    {
    	$item = Item::find($id);
    	$item->name = Input::get('name');
		$item->save();
        return back();
    }

	public function delete($id)
    {
		$user = Auth::user();
    	$item = Item::find($id);
		if ($item->id_owner == $user->id){
			$item->id_parent = $user->id_trash_group;
			$item->save();
		}else{
			$conditions = ['id_user' => $user->id, 'id_item' => $id];
			$sharedItem = SharedItem::where($conditions)->first();
			$sharedItem->id_parent = $user->id_trash_group;
			$sharedItem->save();
		}
        return back();
    }

    public function restore($id)
    {
		$user = Auth::user();
    	$item = Item::find($id);
		if ($item->id_owner == $user->id){
			$item->id_parent = $user->id_home_group;
			$item->save();
		}else{
			$conditions = ['id_user' => $user->id, 'id_item' => $id];
			$sharedItem = SharedItem::where($conditions)->first();
			$sharedItem->id_parent = $user->id_home_group;
			$sharedItem->save();
		}
        return back();
    }

    public function move()
    {
		$user = Auth::user();
    	$item = Item::find(Input::get('item_id'));
		if ($item->id_owner == $user->id){
			$item->id_parent = Input::get('group');
	    	$item->save();
		}else{
			$conditions = ['id_user' => $user->id, 'id_item' => $item->id];
			$sharedItem = SharedItem::where($conditions)->first();
			$sharedItem->id_parent = Input::get('group');
			$sharedItem->save();
		}
    	return back();
    }


    public function share()
    {
    	$item = Item::find(Input::get('item_id'));
    	$privileges = Input::get('privileges');

		$teamId = Input::get('team');
		if (!empty($teamId)){
			$team = Team::find($teamId);
			$teamMembers = $team->members();
			$emails = array();
			foreach ($teamMembers as $user) {
				$emails[] = $user->email;
			}
		}else{
			$input = Input::get('emails');
	    	$emails = preg_split( "/[\s,;]+/", $input );
		}

    	foreach($emails as $email){
    		$user = User::where('email', $email)->first();
    		$sharedItem = new SharedItem;
    		$sharedItem->name = $item->name;
    		$sharedItem->id_parent = $user->id_shared_group;
    		$sharedItem->id_item = $item->id;
    		$sharedItem->id_owner = Auth::user()->id;
    		$sharedItem->id_user = $user->id;
    		$sharedItem->privileges = $privileges;
    		$sharedItem->save();
    	}

    	return back();
    }

    public function clone($id)
    {
		$user = Auth::user();
    	$item = Item::find($id);
		$new_item = $item->replicate();
		$new_item->name .= ' copy';
		$new_item->id_owner = $user->id;
		$new_item->push();
		$new_item_id = DB::getPdo()->lastInsertId();

		foreach(Item::$appModels as $appClass => $appName){
			$apps = $appClass::where('id_parent', $id)->get();
			foreach($apps as $app){
				$new_app = $app->replicate();
				$new_app->id_parent = $new_item_id;
				$new_app->push();
			}
		}

        return back();
    }
}
