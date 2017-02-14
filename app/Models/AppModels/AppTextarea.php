<?php

namespace App\Models\AppModels;

use Illuminate\Database\Eloquent\Model;

class AppImage extends AppModel
{
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_parent', 'name', 'path',
    ];
    
}
