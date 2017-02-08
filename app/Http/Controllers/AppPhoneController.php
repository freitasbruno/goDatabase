<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Item;
use AppPhone;

class AppPhoneController extends Controller
{
	public function create()
    {
    	$itemId = Input::get('item_id');
    	$app = new AppPhone;
    	$app->country_code = Input::get('country_code');
    	$app->number = Input::get('number');
    	$app->extension = Input::get('extension');
    	$app->description = Input::get('description');
    	$app->id_parent = $itemId;
		$app->save();
        return back();
    }
        
	public function update($id)
    {
    	$app = AppPhone::find($id);
    	$app->country_code = Input::get('country_code');
    	$app->number = Input::get('number');
    	$app->extension = Input::get('extension');
    	$app->description = Input::get('description');
		$app->save();
        return back();
    }
        
	public function delete($id)
    {
    	$app = AppPhone::destroy($id);
        return back();
    }
}
