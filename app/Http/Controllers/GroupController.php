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
	    $currentGroup = Group::find($id);
        return view('group', array('groups'=>$groups, 'currentGroup'=>$currentGroup));
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
        
	public function update($id)
    {
    	$group = Group::find($id);
    	$group->name = Input::get('name');
		$group->save();
        return back();
    }
        
	public function delete($id)
    {
    	$group = Group::destroy($id);
        return back();
    }
}
