{!! Form::open(array('url' => 'newAppFile', 'files'=>true, 'class' => 'uk-form')) !!}
	{!! Form::hidden('item_id', $item->id) !!}
	<div class="uk-upload uk-width-1-1 uk-margin-small" uk-form-custom>
		{!! Form::file('upload[]', array('id' => 'fileInputField', 'multiple' => "multiple")) !!}
		<input id="fileName" class="uk-input" type="text" placeholder="Attach files" disabled>
	</div>
	<progress id="progressbar" class="uk-progress uk-margin-remove-top" value="0" max="100" hidden></progress>
	{!! Form::submit('Send', array('class' => 'uk-button uk-width-1-1')) !!}
{!! Form::close() !!}