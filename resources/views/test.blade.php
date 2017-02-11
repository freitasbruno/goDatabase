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
		    			<div class="toggleWrapper">
					    	<div class="uk-card uk-padding-small">
								<a href="#" class="uk-icon-button toggleBtn" uk-icon="icon: plus"></a>
								<a href="#" class="uk-button uk-button-text toggleBtn"><span class="uk-margin-small-left">CREATE</span></a>
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
		    	</div>
			</div>
	    </div>
    </div>

<script>
	
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	
	$(".toggleBtn").click(function(){
		$(this).closest(".toggleWrapper").find(".togglePanel").toggleClass("uk-hidden");
		$(this).closest(".toggleWrapper").find(".toggleField").focus();
	});
	
	$(".toggleField").blur(function(){
		$(this).closest(".toggleWrapper").find(".togglePanel").toggleClass("uk-hidden");
	});
	
	$(".formSubmitField").click(function(){
		$(this).closest(".formSubmitHidden").find(".formSubmitBtn").removeClass("uk-invisible");
	});
	$(".formSubmitField").blur(function(){
		$(this).closest(".formSubmitHidden").find(".formSubmitBtn").addClass("uk-invisible");
	});
	
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
	
    $( document ).ready( function( $ ) {
		
        $( '.ajaxForm' ).submit(function(event) {
        	event.preventDefault();
        	
        	var url = "test";
        	var request = $( this ).serialize();
        	
            //.....
            //show some spinner etc to indicate operation in progress
            //.....
            
     		$.ajax({
		        type: "POST",
		        url: './toggleAppTask/1',
		        data: $( '.ajaxForm' ).serialize(),
		        success: function() {
		            console.log("Success");
		        }
		    })
	
	        .done(function(data) {
	            //console.log(data); 
	        });
            
            //.....
            //do anything else you might want to do
            //.....
     
            //prevent the form from actually submitting in browser
            return false;
        });
    });
    
</script>

@stop