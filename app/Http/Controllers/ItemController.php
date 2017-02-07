<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Item;
use Group;

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
}
