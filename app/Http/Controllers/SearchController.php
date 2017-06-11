<?php

namespace App\Http\Controllers;

use Input;
use Item;
use Group;
use View;

class SearchController extends Controller
{
	protected $groups;
	protected $items;
	protected $foundGroups;
	protected $foundItems;

    public function search()
    {
		$searchString = Input::get('searchString');
		$currentGroupId = Input::get('currentGroup');
		$currentGroup = Group::find($currentGroupId);
		$currentGroup->privileges = Group::checkPrivileges($currentGroup);

		$this->groups = collect();
		$this->items = collect();
		$this->foundGroups = collect();
		$this->getGroupCollection($currentGroup);
		$this->getItemCollection($this->groups);
		$this->findGroups($this->groups, $searchString);
		$this->findItems($this->items, $searchString);

		//$items = Item::where('name', 'LIKE', '%'.$searchString.'%')->get();
        return view('search', array('groups' => $this->foundGroups, 'items' => $this->foundItems, 'searchString' => $searchString));
    }

	public function getGroupCollection($group){
		$group->icon = $group->privileges == 'owner' ? 'folder' : 'social';
		$this->groups->push($group);

		if (count($group->groups()) > 0){
			foreach ($group->groups() as $child) {
				$child->privileges = $group->privileges;
				$this->getGroupCollection($child);
			}
		}
		if (count($group->sharedGroups()) > 0){
			foreach ($group->sharedGroups() as $child) {
				$this->getGroupCollection($child);
			}
		}
		return 0;
	}

	public function findGroups($groups, $searchString){
		foreach ($groups as $group) {
			if (preg_match('/' . $searchString . '/i',$group->name)){
				$this->foundGroups->push($group);
			}
		}
	}

	public function getItemCollection($groups){
		foreach ($groups as $group) {
			$items = $group->items();
			foreach ($items as $item) {
				if (!empty($item)){
					//$item->privileges = $group->privileges;
					$this->items = $this->items->merge($item);
				}
			}
		}
	}
	/*
	public function findItems($items, $searchString){
		foreach ($items as $item) {
			if (preg_match('/' . $searchString . '/i',$item->name)){
				$this->foundItems->push($item);
			}
		}
	}
	*/
    public function findItems($items, $searchString){
    	$this->foundItems = array();

    	foreach (Item::$types as $type){
    		${$type} = array();
    		$this->foundItems[$type] = ${$type};
    	}

    	foreach ($items as $item){
    		$item->apps = $item->appModels();
    		if(isset($this->foundItems[$item->type])){
				if (preg_match('/' . $searchString . '/i',$item->name)){
					array_push($this->foundItems[$item->type], $item);
				}
			}
		}
    }
}
