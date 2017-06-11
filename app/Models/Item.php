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
use Auth;

class Item extends Model
{
	use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'id_parent', 'id_owner', 'type',
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
    	'ItemTaskList' => 'TASK LIST',
    	'ItemDocument' => 'DOCUMENT',
        'ItemContact' => 'CONTACT',
        //'ItemGeneric' => 'GENERIC',
        //'ItemList' => 'LIST',
        //'ItemCalendarEvent' => 'CALENDAR EVENT',
        //'ItemTimer' => 'TIMER',
    );

    public static $icons = array(
        'GENERIC' => 'album',
        'CONTACT' => 'user',
        'TASK LIST' => 'check',
        'LIST' => 'list',
        'CALENDAR EVENT' => 'calendar',
        'TIMER' => 'clock',
        'DOCUMENT' => 'file-edit'
    );

    public static $appModels = array(
        'AppAddress' => 'Address',
        'AppEmail' => 'Email',
        'AppPhone' => 'Phone',
        'AppWebsite' => 'Website',
        'AppTextfield' => 'Textfield',
        'AppTextarea' => 'Textarea',
        'AppImage' => 'Image',
        'AppFile' => 'File',
        'AppTask' => 'Task'
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

	public function isSharedItem(){
		$user = Auth::user();
		$conditions = ['id_user' => $user->id, 'id_item' => $this->id];
		$sharedItem = SharedItem::where($conditions)->first();
		return (!empty($sharedItem));
	}
}
