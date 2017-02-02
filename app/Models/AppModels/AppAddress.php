<?php

namespace App\Models\AppModels;

use Illuminate\Database\Eloquent\Model;

class AppAddress extends Model
{
	use SoftDeletes;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_parent', 'description', 'address01', 'address02', 'address03', 'city', 'country',
    ];
     

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
}