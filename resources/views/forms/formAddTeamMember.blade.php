<div>
    <div class="uk-card uk-card-default uk-card-hover uk-margin-small uk-box-shadow-medium itemCard">
    	<div class="uk-card-header uk-padding-remove toggleWrapper">
	    	<div class="uk-grid-small uk-flex-middle togglePanel" uk-grid>
	            <div class="uk-width-auto uk-margin-left">
	                <span uk-icon="icon: plus"></span>
	            </div>
	            <div class="uk-width-expand uk-padding-small">
	                <h5 class="uk-margin-remove-bottom uk-text-uppercase toggleTextEdit">ADD TEAM MEMBER(s)</h5>
	            </div>
			</div>
	    </div>
	    <div class="uk-card-body uk-padding-small">
        {!! Form::open(array('url' => 'addTeamMembers', 'class' => 'uk-form')) !!}
        	{{ Form::hidden('teamId', $team->id) }}
        	
        	{{ Form::label('role', 'User Role', ['class' => 'uk-form-label']) }}
        	{!! Form::text('role', null, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => 'User Role', 'required' => 'required')) !!}
        	
			{{ Form::label('emails', 'User(s) email(s)', ['class' => 'uk-form-label']) }}
        	{!! Form::text('emails', null, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => 'johndoe@example.com', 'required' => 'required')) !!}
		   
		    {{ Form::submit('SUBMIT', array('class' => 'uk-button uk-button-text uk-margin-top uk-align-right')) }}
		{!! Form::close() !!}
		</div>
    </div>
</div>