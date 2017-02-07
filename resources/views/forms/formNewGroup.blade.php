{!! Form::open(array('url' => 'newGroup', 'class' => 'uk-form')) !!}
	<div class="uk-inline uk-width-1-1">
		<a id="newGroupSubmit" class="uk-form-icon uk-form-icon-flip uk-invisible" href="#" uk-icon="icon: check" onclick="$(this).closest('form').submit()"></a>
		{!! Form::text('name', null, array('id' => 'newGroupForm', 'class' => 'uk-input uk-background-muted', 'placeholder' => 'Group name', 'required' => 'required')) !!}
    </div>
{!! Form::close() !!}

<script>
	$("#newGroupForm").click(function(){
		$("#newGroupSubmit").removeClass("uk-invisible");
	});
	$("#newGroupForm").blur(function(){
		$("#newGroupSubmit").addClass("uk-invisible");
	});
</script>