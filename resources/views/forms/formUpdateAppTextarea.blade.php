{!! Form::open(array('url' => 'newAppTextfield', 'class' => 'uk-form')) !!}
	{{ Form::hidden('item_id', $item->id) }}
	
	{{ Form::label('description', 'Title', ['class' => 'uk-form-label']) }}
	{!! Form::text('description', null, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => 'Title', 'required' => 'required')) !!}
	
	{{ Form::label('name', 'Notes', ['class' => 'uk-form-label']) }}
	{{ Form::textarea('notes', null, array('class' => 'uk-textarea uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => 'Upload description', 'required' => 'required', 'rows' => '3')) }}
   
    {{ Form::submit('SUBMIT', array('class' => 'uk-button uk-button-text uk-align-right')) }}
{!! Form::close() !!}