<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Item;
use AppTextfield;

class AppTextfieldController extends Controller
{
	public function create()
    {
    	$itemId = Input::get('item_id');
    	$app = new AppTextfield;
    	$app->text = Input::get('name');
    	$app->description = Input::get('description');
    	$app->id_parent = $itemId;
		$app->save();
        return back();
    }
        
	public function update($id)
    {
    	$app = AppTextfield::find($id);
    	$app->text = Input::get('name');
    	$app->description = Input::get('description');
		$app->save();
        return back();
    }
        
	public function delete($id)
    {
    	$app = AppTextfield::destroy($id);
        return back();
    }
}
