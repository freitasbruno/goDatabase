<div class="uk-padding-remove uk-margin-small-right uk-margin-remove">
	{!! Form::open(array('url' => 'newGroup', 'class' => 'uk-form')) !!}
		<div class="uk-inline uk-width-1-1">
			<a id="newGroupSubmit" class="uk-form-icon uk-form-icon-flip uk-invisible" href="#" uk-icon="icon: check" onclick="$(this).closest('form').submit()"></a>
			{!! Form::text('name', null, array('id' => 'newGroupForm', 'class' => 'uk-input', 'placeholder' => '+ NEW GROUP', 'required' => 'required')) !!}
        </div>
	{!! Form::close() !!}
</div>

<script>
	$("#newGroupForm").click(function(){
		$("#newGroupSubmit").removeClass("uk-invisible");
	});
	$("#newGroupForm").blur(function(){
		$("#newGroupSubmit").addClass("uk-invisible");
	});
</script>