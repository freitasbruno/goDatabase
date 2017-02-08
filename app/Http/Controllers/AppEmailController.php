<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Item;
use AppEmail;

class AppEmailController extends Controller
{
	public function create()
    {
    	$itemId = Input::get('item_id');
    	$app = new AppEmail;
    	$app->email = Input::get('email');
    	$app->description = Input::get('description');
    	$app->id_parent = $itemId;
		$app->save();
        return back();
    }
        
	public function update($id)
    {
    	$app = AppEmail::find($id);
    	$app->email = Input::get('email');
    	$app->description = Input::get('description');
		$app->save();
        return back();
    }
        
	public function delete($id)
    {
    	$app = AppEmail::destroy($id);
        return back();
    }
}
