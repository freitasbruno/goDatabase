{!! Form::open(array('url' => 'teams', 'class' => 'uk-form')) !!}
	<div class="uk-inline uk-width-1-1">
		<a id="newTeamSubmit" class="uk-form-icon uk-form-icon-flip uk-invisible" href="#" uk-icon="icon: check" onclick="$(this).closest('form').submit()"></a>
		{{ Form::hidden('currentTeamId', $currentTeam->id) }}
		{!! Form::text('name', null, array('id' => 'newTeamForm', 'class' => 'uk-input uk-background-muted', 'placeholder' => 'Team name', 'required' => 'required')) !!}
    </div>
{!! Form::close() !!}

<script>
	$("#newTeamForm").click(function(){
		$("#newTeamSubmit").removeClass("uk-invisible");
	});
	$("#newTeamForm").blur(function(){
		$("#newTeamSubmit").addClass("uk-invisible");
	});
</script>