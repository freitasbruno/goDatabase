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
        'name', 'id_parent', 'icon', 'privileges'
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function groups(){
    	$groups = Group::where('id_parent', $this->id)->get();
		foreach ($groups as $group) {
			$group->privileges = isset($this->privileges) ? $this->privileges : 'owner';
		}
    	return $groups;
    }

	public function sharedGroups(){
		$sharedObjects = SharedGroup::where('id_parent', $this->id)->get();
		$sharedGroups = collect();
		foreach ($sharedObjects as $sharedObject) {
			$group = Group::find($sharedObject->id_group);
			$group->privileges = $sharedObject->privileges;
			$sharedGroups = $sharedGroups->push($group);
		}
		return $sharedGroups;
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
    		$item->privileges = $this->privileges;
    		if(isset($sortedItems[$item->type])){
    			array_push($sortedItems[$item->type], $item);
    		}
		}
    	return $sortedItems;
    }

    public function sharedItems(){
    	$sharedItems = SharedItem::where('id_parent', $this->id)->get();
    	$sortedItems = array();

    	foreach (Item::$types as $type){
    		${$type} = array();
    		$sortedItems[$type] = ${$type};
    	}

    	foreach ($sharedItems as $sharedItem){
    		$item = Item::find($sharedItem->id_item);
    		$item->apps = $item->appModels();
    		$item->privileges = $sharedItem->privileges;
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
