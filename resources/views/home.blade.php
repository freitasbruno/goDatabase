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
		    	</div>
			</div>
	    </div>
    </div>
    
    <div id="modal-close" uk-modal>
	    <div class="uk-modal-dialog uk-modal-body uk-width-1-2@s uk-width-1-4@l">
	        <button class="uk-modal-close-default" type="button" uk-close></button>
	        <h4 class="">Move Item To:</h4>
	        {!! Form::open(array('url' => 'moveItem', 'class' => 'uk-form')) !!}
				{{ Form::select('group', Item::$types, 'Generic', ['class' => 'uk-select']) }}
			    {{ Form::submit('SUBMIT', array('class' => 'uk-button uk-button-text uk-margin-top uk-align-right')) }}
			{!! Form::close() !!}
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
		
		preventLinkDefault();
		toggleAppTaskComplete();
		
        $( '.ajaxForm' ).submit(function(event) {
        	event.preventDefault();
        	
        	var formURL = $( this ).attr('action');
        	var request = $( this ).serialize();
        	var taskCard = $(this).closest('.appTask');
        	
            //.....
            //show some spinner etc to indicate operation in progress
            //.....
            
     		$.ajax({
		        type: "POST",
		        url: formURL,
		        data: $( '.ajaxForm' ).serialize(),
		        success: function() {
		            console.log("Success");
		        }
		    },"json")
	
	        .done(function(data) {
	        	toggleAppTask(taskCard, data['taskComplete']);
	        	preventLinkDefault();
	        	//document.location.reload(true)
	        });
            
            //.....
            //do anything else you might want to do
            //.....
     
            //prevent the form from actually submitting in browser
            
            return false;
        });
    });
    
    function preventLinkDefault() {
    	$('.preventScroll').click(function(event) {
		    event.preventDefault();
		});
    }
    
    function toggleAppTaskComplete() {
		var countComplete = $('.appTaskComplete').children().length;
        //console.log(count);
        if(countComplete > 0){
        	$('.appTaskCompleteOuter').removeClass('uk-hidden');
        }else{
        	$('.appTaskCompleteOuter').addClass('uk-hidden');
        }
    } 
    
    function toggleAppTask(taskCard, taskComplete) {
    	taskCard.toggleClass('uk-card-default appSelect');
    	
    	if(taskComplete){
        	taskCard.find('span:first').wrap('<s class="uk-text-muted">');
        	taskCard.find('.taskIcon').replaceWith('<a class="uk-form-icon taskIcon preventScroll" href="#" uk-icon="icon: plus-circle" onclick="$(this).closest(\'form\').submit()"></a>');
        	taskCard.prependTo(taskCard.closest('.appTaskList').find('.appTaskComplete'));
        }else{
        	taskCard.find('span:first').unwrap("<s>");
        	taskCard.find('.taskIcon').replaceWith('<a class="uk-form-icon taskIcon preventScroll" href="#" uk-icon="icon: minus-circle" onclick="$(this).closest(\'form\').submit()"></a>');
        	taskCard.appendTo(taskCard.closest('.appTaskList').find('.appTaskToDo'));
        }
        
        toggleAppTaskComplete();
         
    }
    
</script>

@stop