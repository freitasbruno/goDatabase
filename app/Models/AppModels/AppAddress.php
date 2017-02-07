<?php

namespace App\Models\AppModels;

use Illuminate\Database\Eloquent\Model;

class AppAddress extends AppModel
{
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_parent', 'description', 'address01', 'address02', 'address03', 'city', 'country',
    ];
     
}