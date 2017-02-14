<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Item;

class Group extends Model
{
	
	public $children = [];
	
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
    
    public function groups(){
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
    
    public function groupHierarchy (){
    	
    	if (count($this->groups()) > 0) {
    		
    		foreach ($this->groups() as $group) {
    			$this->children[$group->name] = $group->groupHierarchy();
    		}
    	}
    	return $this;
    }
    /*
    public static function groupHierarchySelect ($groups, $i=0){
    	
    	$str = '<option name="{!! $group->id !!}>' . str_repeat("--", $i) . ">" . $groups->name . "</option>";
    	
    	if(!empty($groups->children)){
    		$i++;
    		foreach ($groups->children as $group) {
				$str .= Group::groupHierarchyStr($group, $i);
			}
		}
		
		return $str;
    }
    */
    public static function flatten(array $array) { 
    	$return = array(); 
    	array_walk_recursive($array, 
    		function($a,$b) use (&$return) { 
    			$return[$b] = $a; 
    		}); 
    	return $return; 
    }
    
    public static function groupHierarchySelect ($group, $i=0){
    	$groups = [];
    	$groups[$group->id] = str_repeat("--", $i) . ">" . $group->name;
    	
    	if(!empty($group->children)){
    		$i++;
    		foreach ($group->children as $child) {
				$groups[$child->id] = Group::groupHierarchySelect($child, $i);
			}
    	}	
		
		return $groups;
		
    }
}
