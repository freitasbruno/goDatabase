<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Item;

class Group extends Model
{
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'id_parent',
    ];
     

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    private function groups(){
    	$groups = Group::where('id_parent', $this->id)->get();
    	return $groups;
    }
	
    public function items(){
    	$items = Item::where('id_parent', $this->id)->get();
    	$sortedItems = array();
    	
    	foreach (Item::$types as $type){
    		${$type} = array();
    		$sortedItems[$type] = ${$type};
    	}
    	
    	foreach ($items as $item){
    		$item->apps = $item->appModels();
    		if(isset($sortedItems[$item->type])){
    			array_push($sortedItems[$item->type], $item);
    		}
		}
    	return $sortedItems;
    }
    
}
