<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Group;

class GroupController extends Controller
{
	
	public function index($id)
    {
    	session(['currentGroup' => $id]);
	    $groups = Group::where('id_parent', $id)->get();
        return view('group', array('groups'=>$groups));
    }
    
	public function create()
    {
    	$currentGroupId = session('currentGroup');
    	$group = new Group;
    	$group->name = Input::get('name');
    	$group->id_parent = $currentGroupId;
		$group->save();
        return back();
    }
}
