{!! Form::open(array('url' => 'newAppImage', 'files'=>true, 'class' => 'uk-form')) !!}
	{!! Form::hidden('item_id', $item->id) !!}
	<div class="uk-upload uk-width-1-1 uk-margin-small" uk-form-custom>
		{!! Form::file('upload', array('id' => 'fileInputField')) !!}
		<input id="imageName" class="uk-input" type="text" placeholder="Attach image thumbnail" disabled>
	</div>
	<progress id="progressbar" class="uk-progress uk-margin-remove-top" value="0" max="100" hidden></progress>
	{!! Form::submit('Send', array('class' => 'uk-button uk-width-1-1')) !!}
{!! Form::close() !!}