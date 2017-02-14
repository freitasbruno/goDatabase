<div id="modal-move-group" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-width-1-2@s uk-width-1-4@l">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h4 class="">Move Group To:</h4>
        {!! Form::open(array('url' => 'moveGroup', 'class' => 'uk-form')) !!}
        	{!! Form::hidden('group_id', '') !!}
			{{ Form::select('group', $groupsArray2, null, ['class' => 'uk-select']) }}
		    {{ Form::submit('SUBMIT', array('class' => 'uk-button uk-button-text uk-margin-top uk-align-right')) }}
		{!! Form::close() !!}
    </div>
</div>