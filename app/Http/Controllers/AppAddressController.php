<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Item;
use AppAddress;

class AppAddressController extends Controller
{
	public function create()
    {
    	$itemId = Input::get('item_id');
    	$app = new AppAddress;
    	$app->address01 = Input::get('address01');
    	$app->address02 = Input::get('address02');
    	$app->address03 = Input::get('address03');
    	$app->city = Input::get('city');
    	$app->country = Input::get('country');
    	$app->description = Input::get('description');
    	$app->id_parent = $itemId;
		$app->save();
        return back();
    }
        
	public function update($id)
    {
    	$app = AppAddress::find($id);
    	$app->address01 = Input::get('address01');
    	$app->address02 = Input::get('address02');
    	$app->address03 = Input::get('address03');
    	$app->city = Input::get('city');
    	$app->country = Input::get('country');
    	$app->description = Input::get('description');
		$app->save();
        return back();
    }
        
	public function delete($id)
    {
    	$app = AppAddress::destroy($id);
        return back();
    }
}
