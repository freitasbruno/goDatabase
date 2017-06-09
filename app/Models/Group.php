<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Item;
use Auth;

class Group extends Model
{
	use SoftDeletes;

	public $children = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'id_parent', 'id_owner', 'icon', 'privileges'
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
			$group->privileges = $this->privileges;
			$group->icon = $group->privileges == 'owner' ? 'folder' : 'social';
		}
    	return $groups;
    }

	public function sharedGroups(){
		$sharedObjects = SharedGroup::where('id_parent', $this->id)->get();
		$sharedGroups = collect();
		foreach ($sharedObjects as $sharedObject) {
			$group = Group::find($sharedObject->id_group);
			$group->privileges = $sharedObject->privileges;
			$group->icon = 'social';
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

	public function isSharedGroup(){
		$user = Auth::user();
		$conditions = ['id_user' => $user->id, 'id_group' => $this->id];
		$sharedGroup = SharedGroup::where($conditions)->first();
		return (!empty($sharedGroup));
	}

	public function getParent(){
		$user = Auth::user();
	}

    public static function topParent($group){
    	if ($group->id_parent == 0){
    		return $group;
    	}else{
    		$parent = Group::find($group->id_parent);
    		return Group::topParent($parent);
    	}
    }

	public static function checkPrivileges($group){
		$user = Auth::user();
		if ($group->id_owner == $user->id){
			return 'owner';
		}else{
			$conditions = ['id_user' => $user->id, 'id_group' => $group->id];
			$sharedGroup = SharedGroup::where($conditions)->first();
			if (!empty($sharedGroup)){
				return $sharedGroup->privileges;
			}else{
				$parent = Group::find($group->id_parent);
				return Group::checkPrivileges($parent);
			}
		}
	}
}
