<?php

namespace App\Models\AppModels;

use Illuminate\Database\Eloquent\Model;

class AppPhone extends AppModel
{
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_parent', 'description', 'country_code', 'number', 'extension',
    ];
    
}
