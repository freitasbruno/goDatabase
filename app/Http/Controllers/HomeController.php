<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Group;
use Item;
use Team;

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
    	$home = Group::find($user->id_home_group);
    	$shared = Group::find($user->id_shared_group);
    	$trash = Group::find($user->id_trash_group);
    	$pin = Group::find($user->id_pins_group);
    	$teamsGroup = Team::find($user->id_teams_group);
    	$groups = [$home, $shared, $trash, $pin];
    	
        return view('dashboard', array('groups'=>$groups, 'teamsGroup'=>$teamsGroup));
    }
}
