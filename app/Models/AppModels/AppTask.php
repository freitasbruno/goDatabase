<?php

namespace App\Models\AppModels;

use Illuminate\Database\Eloquent\Model;

class AppTask extends AppModel
{
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_parent', 'name', 'checked',
    ];
    
}
