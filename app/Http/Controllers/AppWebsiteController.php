<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Item;
use AppWebsite;

class AppWebsiteController extends Controller
{
	public function create()
    {
    	$itemId = Input::get('item_id');
    	$app = new AppWebsite;
    	$app->url = Input::get('url');
    	$app->name = Input::get('name');
    	$app->id_parent = $itemId;
		$app->save();
        return back();
    }
        
	public function update($id)
    {
    	$app = AppWebsite::find($id);
    	$app->url = Input::get('url');
    	$app->name = Input::get('name');
		$app->save();
        return back();
    }
        
	public function delete($id)
    {
    	$app = AppWebsite::destroy($id);
        return back();
    }
}
