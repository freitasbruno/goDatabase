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
						@include('includes/createTeamBtn')
						@each('includes/teamBtn', $teams, 'team')
					</div>

				</div>

		    	<div id="itemsDisplay" class="uk-width-expand uk-margin-remove uk-padding-small">
		    		@include('includes/teamBreadcrumbs')
		    		@if(count($teams) > 0)
		    			@foreach($teams as $team)
		    				@include('includes/teamPanel')
						@endforeach
					@endif
		    	</div>
			</div>
	    </div>
    </div>
@stop
