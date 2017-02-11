<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Input;
use Group;

class AjaxController extends Controller
{
    public function testfunction(Request $request)
    {
    	/*
    	$group = new Group;
    	$group->name = Input::get('name');
    	$group->id_parent = 2;
		$group->save();
		*/
        return Response::json(Input::all());
    }
    
}