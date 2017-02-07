@extends('layouts.master')

@section('header')
@stop

@section('content')

	<div class="uk-section uk-padding-remove">
	    <div class="uk-container uk-container-expand uk-padding-remove">
	    	<div class="uk-grid uk-margin-remove" uk-grid>
	    		<div class="uk-width-3-4 uk-width-1-3@s uk-width-1-5@m uk-width-1-6@l uk-padding-remove">
	    			<div class="uk-logo">
				    	<a class="uk-navbar-item uk-logo" href="/home"><span class="uk-margin-right" uk-icon="icon: user"></span>{!! Auth::user()->name !!}</a>
			    	</div>
	    		</div>
	    		<div class="uk-width-expand uk-padding-remove uk-margin-remove">
	    			@include('includes/nav')
	    		</div>	
			</div>	
	    	<div class="uk-grid uk-margin-remove" uk-grid>
		    	<div id="groupsDisplay" class="uk-width-1-3@s uk-width-1-5@m uk-width-1-6@l uk-padding-remove" uk-height-viewport="expand: true">
		    		<div class="uk-light">
				    	<div class="uk-card uk-padding-small uk-visible-toggle groupBtn">
							<a href="#toggle-animation" class="uk-link-reset" uk-toggle="target: #toggle-animation; animation: uk-animation-slide-left-medium">+ Add New</a>
						</div>
			    		<div id="toggle-animation">	
				    		<div>
		    					<div class="uk-card uk-card-body uk-padding-small">
				    				<p><span uk-icon="icon: plus; ratio:0.7"></span> New Item</p>
				    				<hr class="uk-divider-small">
				    				@include('forms/formNewItem')
					    		</div>
					    	</div>
					    	<div>
		    					<div class="uk-card uk-card-body uk-padding-small">
				    				<p><span uk-icon="icon: plus; ratio:0.7"></span> New Group</p>
				    				<hr class="uk-divider-small">
				    				@include('forms/formNewGroup')
					    		</div>
					    	</div>	
					    	<hr>
					    </div>	
						@each('includes/groupBtn', $groups, 'group')
					</div>
				</div>
		    	
		    	<div id="itemsDisplay" class="uk-width-expand uk-margin-remove uk-padding-small">
		    		@include('includes/breadcrumbs')
		    		@if(count($items) > 0)
		    			@foreach(Item::$types as $type)
		    				@if (!empty($items[$type]))
			    				<div>
			    					<div class="uk-card uk-box-shadow-medium uk-padding-small uk-margin-bottom uk-border-rounded itemTypePanel">
			    						<div class="uk-card-header uk-padding-remove">
									        <h5>{!! $type !!}</h5>
									    </div>
										<div class="uk-card-body">
											<div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-grid-match" uk-grid>
												@each('includes/itemCard', $items[$type], 'item')						
											</div>
									    </div>
									    <div class="uk-card-footer">
											footer
									    </div>
									</div>    
								</div>
							@endif
						@endforeach
						
					@endif
		    	</div>
			</div>
	    </div>
    </div>

<script>

	$(".editBtn").click(function(){
		var btnId = $(this).attr('id').replace(/[^0-9\.]/g, '');
		$('#groupBtnForm'+btnId).removeClass("uk-hidden");
		$('#groupBtnForm'+btnId+' :input').focus();
		$(this).closest('.groupBtn').addClass("uk-hidden");
	});
	
	$('.groupBtnForm :input').blur(function(){
		$('.groupBtnForm').addClass("uk-hidden");
		$('.groupBtn').removeClass("uk-hidden");
	});
	
	$(".editItemBtn").click(function(){
		var btnId = $(this).attr('id').replace(/[^0-9\.]/g, '');
		$('#itemBtnForm'+btnId).removeClass("uk-hidden");
		$('#itemBtnForm'+btnId+' :input').focus();
		$('#itemBtn'+btnId).addClass("uk-hidden");
	});
	
	$('.itemBtnForm :input').blur(function(){
		$('.itemBtnForm').addClass("uk-hidden");
		$('#itemBtn'+btnId).removeClass("uk-hidden");
	});	
	
</script>
@stop