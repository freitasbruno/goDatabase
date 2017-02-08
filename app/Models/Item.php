<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use ItemContact;
use ItemCalendarEvent;
use ItemDocument;
use ItemGeneric;
use ItemList;
use ItemTaskList;
use ItemTimer;

class Item extends Model
{
	use SoftDeletes;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'id_parent', 'type',
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
    public static $types = array(
        'ItemGeneric' => 'GENERIC', 
        'ItemContact' => 'CONTACT', 
        'ItemTaskList' => 'TASK LIST', 
        'ItemList' => 'LIST', 
        'ItemCalendarEvent' => 'CALENDAR EVENT', 
        'ItemTimer' => 'TIMER', 
        'ItemDocument' => 'DOCUMENT'
    ); 
    
    public static $appModels = array(
        'AppAddress' => 'Address', 
        'AppEmail' => 'Email', 
        'AppPhone' => 'Phone', 
        'AppWebsite' => 'Website', 
        'AppTextfield' => 'Textfield'
    );
    
    //public $apps = array();
    
    public function appModels(){
    	
    	$appModels = array();
    	
    	foreach (Item::$appModels as $appModelClass => $name){
    		${$name} = $appModelClass::where('id_parent', $this->id)->get();
    		$appModels[$name] = ${$name};
    	}
    	
    	return $appModels;
    }
}