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
						@each('includes/groupBtn', $groups, 'group')
						@include('includes/teamBtn', ['team' => $teamsGroup])
					</div>
				</div>

		    	<div id="itemsDisplay" class="uk-width-expand uk-margin-remove uk-padding-small">

		    	</div>
			</div>
	    </div>
    </div>
@stop
