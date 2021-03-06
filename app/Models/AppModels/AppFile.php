<?php

namespace App\Models\AppModels;

use Illuminate\Database\Eloquent\Model;

class AppFile extends AppModel
{
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_parent', 'name', 'originalName', 'extension',
    ];
    
}