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

class ItemController extends Controller
{
	public function create()
    {
    	$currentGroupId = session('currentGroup');
    	$item = new Item;
    	$item->name = Input::get('name');
    	$item->type = Item::$types[Input::get('type')];
    	$item->id_parent = $currentGroupId;
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
    	$item = Item::find($id);
    	$item->id_parent = auth::user()->id_trash_group;
    	$item->save();
        return back();
    }

    public function restore($id)
    {
    	$item = Item::find($id);
    	$item->id_parent = auth::user()->id_home_group;
    	$item->save();
        return back();
    }

    public function move()
    {
    	$item = Item::find(Input::get('item_id'));
    	$item->id_parent = Input::get('group');
    	$item->save();
    	return back();
    }


    public function share()
    {

    	$item = Item::find(Input::get('item_id'));
    	$privileges = Input::get('privileges');
    	$input = Input::get('emails');
    	$emails = preg_split( "/[\s,;]+/", $input );

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
    	$item = Item::find($id);
		$new_item = $item->replicate();
		$new_item->name .= ' copy';
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
