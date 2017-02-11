<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Item;
use Group;
use AppAddress;
use AppEmail;
use AppPhone;
use AppTask;
use AppTextfield;
use AppWebsite;
use DB;

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
    	$item = Item::destroy($id);
        return back();
    }
    
    public function move($id)
    {
    	return Input::get('group');
        //return back();
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
