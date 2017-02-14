@extends('layouts.master')

@section('header')
@stop

@section('content')

	<div class="uk-section uk-padding-remove">
	    <div class="uk-container uk-container-expand uk-padding-remove">
	    	<div class="uk-grid uk-margin-remove" uk-grid>
	    		<div class="uk-width-3-4 uk-width-1-3@s uk-width-1-5@m uk-width-1-6@l uk-padding-remove">
	    			<div class="uk-logo uk-light topNav">
				    	<a class="uk-navbar-item uk-logo" href="/home"><span class="uk-margin-right" uk-icon="icon: user"></span>{!! Auth::user()->name !!}</a>
			    	</div>
	    		</div>
	    		<div class="uk-width-expand uk-padding-remove uk-margin-remove uk-light topNav">
	    			@include('includes/nav')
	    		</div>	
			</div>	
	    	<div class="uk-grid uk-margin-remove" uk-grid>
		    	<div id="groupsDisplay" class="uk-width-1-3@s uk-width-1-5@m uk-width-1-6@l uk-padding-remove" uk-height-viewport="expand: true">
		    		<div class="uk-light">
		    			<div class="toggleWrapper">
					    	<div class="uk-card uk-padding-small">
								<a href="#" class="uk-icon preventScroll toggleBtn" uk-icon="icon: plus"></a>
								<a href="#" class="uk-button uk-button-text preventScroll toggleBtn"><span class="uk-margin-small-left">CREATE</span></a>
							</div>
				    		<div class="uk-animation-fade uk-hidden togglePanel">	
					    		<div class="uk-border-rounded createPanel">
			    					<div class="uk-card uk-card-body uk-padding-small">
					    				<p><span uk-icon="icon: plus; ratio:0.7"></span> New Item</p>
					    				<hr class="uk-divider-small">
					    				@include('forms/formNewItem')
						    		</div>
						    	</div>
						    	<div class="uk-border-rounded createPanel">
			    					<div class="uk-card uk-card-body uk-padding-small">
					    				<p><span uk-icon="icon: plus; ratio:0.7"></span> New Group</p>
					    				<hr class="uk-divider-small">
					    				@include('forms/formNewGroup')
						    		</div>
						    	</div>	
						    	<hr>
						    </div>
					    </div>
						@each('includes/groupBtn', $groups, 'group')
					</div>
				</div>
		    	
		    	<div id="itemsDisplay" class="uk-width-expand uk-margin-remove uk-padding-small">
		    		@include('includes/breadcrumbs')
		    		@if(count($items) > 0)
		    			@foreach(Item::$types as $itemClass => $type)
		    				@if (!empty($items[$type]))
		    					@include('includes/itemPanel')
							@endif
						@endforeach
					@endif
					
					<?php
					$user = auth::user();
					$userGroup = Group::find($user->id_home_group);
					$groupsArray = Group::groupHierarchySelect($userGroup->groupHierarchy());
					$groupsArray2 = Group::flatten($groupsArray);
					?>
					
		    	</div>
			</div>
	    </div>
    </div>
    
    @include('forms/modalFormMoveItem')
    @include('forms/modalFormMoveGroup')

@stop