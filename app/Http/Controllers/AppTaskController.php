<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Input;
use Item;
use AppTask;

class AppTaskController extends Controller
{
	public function create()
    {
    	$itemId = Input::get('item_id');
    	$app = new AppTask;
    	$app->name = Input::get('name');
    	$app->id_parent = $itemId;
		$app->save();
        return back();
    }
        
	public function update($id)
    {
    	$app = AppTask::find($id);
    	$app->name = Input::get('name');
		$app->save();
        return back();
    }
    
    public function toggle(Request $request, $id)
    {
    	$app = AppTask::find($id);
    	$app->complete = ($app->complete ? false : true);
		$app->save();
        return Response::json(['responseText' => 'Success!', 'appId' => $id, 'taskComplete' => $app->complete]);
    }
    
	public function delete($id)
    {
    	$app = AppTask::destroy($id);
        return back();
    }
}
