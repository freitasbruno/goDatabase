<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Group;
use Item;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$user = Auth::user();
    	$currentGroup = Group::find($user->id_home_group);
	    session(['currentGroup' => $currentGroup->id]);
	    
	    $groups = Group::where('id_parent', $currentGroup->id)->get();
	    $items = Item::where('id_parent', $currentGroup->id)->get();
        return view('home', array('currentGroup'=>$currentGroup, 'groups'=>$groups, 'items'=>$items));
    }
}
