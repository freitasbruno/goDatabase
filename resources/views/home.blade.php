<?php
$user = auth::user();
$userGroup = Group::find($user->id_home_group);
$groupsArray = Group::groupHierarchySelect($userGroup->groupHierarchy());
$groupsArray2 = Group::flatten($groupsArray);
$teams = Team::userTeams();
$teamsList = array();
foreach ($teams as $team) {
	$teamsList[$team->id] = $team->name;
}
?>

@extends('layouts.master')

@section('header')
@stop

@section('content')
	<div class="uk-section uk-padding-remove">
	    <div class="uk-container uk-container-expand uk-padding-remove">
	    	@include('includes/topbar')
	    	<div class="uk-grid uk-margin-remove" uk-grid>
		    	<div id="groupsDisplay" class="uk-width-2-5@s uk-width-1-4@m uk-width-1-5@l uk-padding-remove" uk-height-viewport="expand: true">
		    		<div class="uk-light">
						@include('includes/userGroupsBtns')
						<hr class="uk-margin-remove">
						@if($currentGroup->id != auth::user()->id_trash_group
						    && $currentGroup->id != auth::user()->id_pins_group
						    && $currentGroup->id != auth::user()->id_shared_group
						    && $currentGroup->privileges != 'view')
						        @include('includes/createGroupBtn')
						        @include('includes/createItemBtn')
						@endif
						@each('includes/groupBtn', $groups, 'group')
					</div>
				</div>

		    	<div id="itemsDisplay" class="uk-width-expand uk-margin-remove uk-padding-small">
		    		@include('includes/breadcrumbs', ['user'=>$user])
		    		@if(count($items) > 0)
		    			@foreach(Item::$types as $itemClass => $type)
		    				@if (!empty($items[$type]))
		    					@include('includes/itemPanel')
							@endif
						@endforeach
					@endif
		    	</div>
			</div>
	    </div>
    </div>

    @include('forms/modalFormMoveItem')
    @include('forms/modalFormMoveGroup')
    @include('forms/modalFormShareItem')
    @include('forms/modalFormShareGroup')

@stop
