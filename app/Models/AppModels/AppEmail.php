<?php

namespace App\Models\AppModels;

use Illuminate\Database\Eloquent\Model;

class AppEmail extends Model
{
	use SoftDeletes;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_parent', 'email', 'description',
    ];
     

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
}
