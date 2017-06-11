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
						@if(count($groups) > 0)
			    			@each('includes/groupBtn', $groups, 'group')
						@else
							<div class="uk-card uk-padding-small uk-visible-toggle togglePanel groupBtn">
								<div uk-grid>
									<div class="uk-width-expand uk-text-bold toggleTextEdit">
										No Groups found with "{!! $searchString !!}"
									</div>
								</div>
							</div>
						@endif
					</div>
				</div>
		    	<div id="itemsDisplay" class="uk-width-expand uk-margin-remove uk-padding-small">
					@if(count($items) > 0)
		    			@foreach(Item::$types as $itemClass => $type)
		    				@if (!empty($items[$type]))
		    					@include('includes/itemBtnPanel')
							@endif
						@endforeach
					@endif
		    	</div>
			</div>
	    </div>
    </div>
@stop
