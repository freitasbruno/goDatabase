<?php
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
?>

@each('includes/groupBtn', $userGroups, 'group')
@include('includes/teamBtn', ['team' => $teamsGroup])
