
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".toggleBtn").click(function(){
	$(this).closest(".toggleWrapper").find(".togglePanel").toggleClass("uk-hidden");
	$(this).closest(".toggleWrapper").find(".toggleField").focus();
});

$(".toggleTextEdit").dblclick(function(){
	$(this).closest(".toggleWrapper").find(".togglePanel").toggleClass("uk-hidden");
	$(this).closest(".toggleWrapper").find(".toggleField").focus();
});

$(".toggleField").blur(function(){
	$(this).closest(".toggleWrapper").find(".togglePanel").toggleClass("uk-hidden");
});

/*
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
*/

$(".moveBtn").click(function(){
	var id = $(this).attr('name');
	$('#modal-move-item').find($('input[name=item_id]').val(id));
	$('#modal-move-group').find($('input[name=group_id]').val(id));
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