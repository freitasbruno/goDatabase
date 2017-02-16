<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iso', 'name', 'nicename', 'phonecode',
    ];

    public static function countryArray (){
    	$countries = static::all();
    	$countriesArray = [];
    	
		foreach ($countries as $country) {
			$countriesArray[$country->name] = $country->iso . " " . $country->nicename;
		}	
		return $countriesArray;
    }
    
    public static function countryCodesArray (){
    	$countries = static::all();
    	$countriesArray = [];
    	
		foreach ($countries as $country) {
			$countriesArray["+".$country->phonecode] = $country->nicename . " +" . $country->phonecode;
		}	
		return $countriesArray;
    }
}
