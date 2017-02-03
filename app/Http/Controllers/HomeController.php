<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Group;

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
    	$homeGroup = Group::find($user->id_home_group);
	    session(['currentGroup' => $homeGroup->id]);
	    
	    $groups = Group::where('id_parent', $homeGroup->id)->get();
	    
        return view('home', array('homeGroup'=>$homeGroup, 'groups'=>$groups));
    }
}
