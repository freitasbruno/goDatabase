<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Team extends Model
{
	use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'id_parent', 'description', 'logo',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

	public function teams()
	{
		$user = Auth::user();
		$teams = Team::where('id_parent', $this->id)->get();
		return $teams;
	}

	public function members()
	{
		$members = TeamMember::where('id_team', $this->id)->get();
		$users = collect();
		foreach ($members as $member){
			$user = User::find($member->id_user);
			$user->role = $member->role;
			$user->teamMemberId = $member->id;
			$users = $users->push($user);
		}
		return $users;
	}

	public static function userTeams(){
		$user = Auth::user();
		$memberOfTeams = TeamMember::where('id_user', $user->id)->get();
		$teams = collect();
		foreach ($memberOfTeams as $memberOfTeam){
			$team = Team::find($memberOfTeam->id_team);
			$teams = $teams->push($team);
		}
		return $teams;
	}

}
