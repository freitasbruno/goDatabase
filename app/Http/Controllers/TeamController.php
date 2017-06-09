<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Team;
use Group;
use Auth;
use Input;
use User;
use TeamMember;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
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
    	$userGroups = [$home, $shared, $trash, $pin];
        $teams = $teamsGroup->teams();
        $memberTeams = TeamMember::where('id_user', $user->id)->get();
        foreach ($memberTeams as $memberTeam){
        	$teams = $teams->push(Team::find($memberTeam->id_team));
        }
        $teams = $teams->unique();

        return view('teams', array('userGroups'=>$userGroups, 'teams'=>$teams, 'teamsGroup'=>$teamsGroup, 'currentTeam'=>$teamsGroup));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
    	$home = Group::find($user->id_home_group);
    	$shared = Group::find($user->id_shared_group);
    	$trash = Group::find($user->id_trash_group);
    	$pin = Group::find($user->id_pins_group);
    	$teamsGroup = Team::find($user->id_teams_group);
    	$currentTeam = Team::find($id);
    	$userGroups = [$home, $shared, $trash, $pin];
        $teams = $currentTeam->teams();
        if($currentTeam->id_parent == 0){
        	$memberTeams = TeamMember::where('id_user', $user->id)->get();
	        foreach ($memberTeams as $memberTeam){
	        	$teams = $teams->push(Team::find($memberTeam->id_team));
	        }
	        $teams = $teams->unique();
        }
        session(['currentGroup' => 0]);
		session(['currentTeam' => $id]);

        return view('teams', array('userGroups'=>$userGroups, 'teams'=>$teams, 'teamsGroup'=>$teamsGroup, 'currentTeam'=>$currentTeam));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $currentTeamId = $request->input('currentTeamId');
    	$team = new Team;
    	$team->name = $request->input('name');
    	$team->id_parent = $currentTeamId;
        $team->id_owner = $user->id;
		$team->save();
        return back();
    }

    public function addTeamMembers(Request $request)
    {
        $teamId = $request->input('teamId');

        $input = $request->input('emails');
    	$emails = preg_split( "/[\s,;]+/", $input );
    	$role = $request->input('role');

    	foreach($emails as $email){
    		$user = User::where('email', $email)->first();
    		if (empty($user)){
    			// Create notification for current user
    		}else{
    			$teamMember = new TeamMember;
	    		$teamMember->id_team = $teamId;
	    		$teamMember->id_user = $user->id;
	    		$teamMember->role = $role;
	    		$teamMember->save();
    		}
    	}
    	return back();
    }

    public function removeTeamMember($id)
    {
        TeamMember::destroy($id);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
