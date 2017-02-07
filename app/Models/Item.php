<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	use SoftDeletes;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'id_parent', 'type'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    /**
     * The type of items that are supported by default.
     *
     * @var array
     */
    public static $types = [
        'GENERIC', 'CONTACT', 'TASK LIST', 'LIST', 'CALENDAR EVENT', 'TIMER', 'DOCUMENT'
    ];    
}
