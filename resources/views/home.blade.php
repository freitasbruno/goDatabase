@extends('layouts.master')

@section('header')
@stop

@section('content')

	<div class="uk-section uk-padding-remove">
	    <div class="uk-container uk-container-expand uk-padding-remove">
	    	<div class="uk-grid uk-margin-remove" uk-grid>
		    	<div id="groupsDisplay" class="uk-width-1-3@s uk-width-1-5@m uk-width-1-6@l uk-padding-remove" uk-height-viewport="expand: true">
		    		@include('forms/formNewGroup')
					@each('includes/groupBtn', $groups, 'group')
					<!--
					<button href="#toggle-animation" class="uk-button uk-button-default" type="button" uk-toggle="target: #toggle-animation; animation: uk-animation-slide-left-medium">Toggle</button>
					<div id="toggle-animation" class="uk-card uk-card-default uk-card-body uk-margin-small">Animation</div>	
					-->
		    	</div>
		    	<div id="itemsDisplay" class="uk-width-expand uk-padding-remove">
		    		
		    	</div>
			</div>
	    </div>
    </div>

@stop