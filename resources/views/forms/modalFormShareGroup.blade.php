<div id="modal-share-group" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-width-1-2@s uk-width-1-4@l">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h4 class="">Share Group with:</h4>
        {!! Form::open(array('url' => 'shareGroup', 'class' => 'uk-form')) !!}
        	{!! Form::hidden('group_id', '') !!}

        	{{ Form::label('privileges', 'Share Privileges', ['class' => 'uk-form-label']) }}
			{{ Form::select('privileges', [null=>'Please Select'] + ['view' => 'User(s) can View', 'edit' => 'User(s) can View and Edit'], null, ['class' => 'uk-select uk-background-muted selectField', 'required' => 'required']) }}

            {{ Form::label('team', 'Share With Team', ['class' => 'uk-form-label']) }}
			{{ Form::select('team', [null=>'Please Select'] + $teamsList, null, ['class' => 'uk-select uk-background-muted selectField']) }}

			{{ Form::label('emails', 'User(s) email(s)', ['class' => 'uk-form-label']) }}
        	{!! Form::text('emails', null, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => 'johndoe@example.com')) !!}

		    {{ Form::submit('SUBMIT', array('class' => 'uk-button uk-button-text uk-margin-top uk-align-right')) }}
		{!! Form::close() !!}
    </div>
</div>
