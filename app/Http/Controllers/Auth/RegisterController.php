<?php

namespace App\Http\Controllers\Auth;

use User;
use Group;
use Team;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    
    /**
     * Create a new user instance after a valid registration, along with his new homeGroup.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
    	$home = new Group;
    	$home->name = "HOME";
    	$home->icon = "home";
    	$home->save();
    	
    	$shared = new Group;
    	$shared->name = "SHARED";
    	$shared->icon = "social";
    	$shared->save();
    	
    	$trash = new Group;
    	$trash->name = "TRASH";
    	$trash->icon = "trash";
    	$trash->save();
    	
    	$pin = new Group;
    	$pin->name = "PINS";
    	$pin->icon = "star";
    	$pin->save();
    	
    	$teams = new Team;
    	$teams->name = "TEAMS";
    	$teams->description = "Default group for storing user teams";
    	$teams->save();
    	
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'id_home_group' => $home->id,
            'id_shared_group' => $shared->id,
            'id_trash_group' => $trash->id,
            'id_pins_group' => $pin->id,
            'id_teams_group' => $teams->id,
        ]);
    }    
}
