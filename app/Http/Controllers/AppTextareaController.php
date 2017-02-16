<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Item;
use AppTextarea;

class AppTextareaController extends Controller
{
	public function create()
    {
    	$itemId = Input::get('item_id');
    	$app = new AppTextarea;
    	$app->text = Input::get('notes');
    	$app->description = Input::get('description');
    	$app->id_parent = $itemId;
		$app->save();
        return back();
    }
        
	public function update($id)
    {
    	$app = AppTextarea::find($id);
    	$app->text = Input::get('notes');
    	$app->description = Input::get('description');
		$app->save();
        return back();
    }
        
	public function delete($id)
    {
    	$app = AppTextarea::destroy($id);
        return back();
    }
}
