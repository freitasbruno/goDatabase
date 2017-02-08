{!! Form::open(array('url' => 'newAppWebsite', 'class' => 'uk-form')) !!}
	{{ Form::hidden('item_id', $item->id) }}
	
	{{ Form::label('name', 'Website Name', ['class' => 'uk-form-label']) }}
	{!! Form::text('name', null, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => 'Example Inc.', 'required' => 'required')) !!}
	
	{{ Form::label('url', 'Website URL', ['class' => 'uk-form-label']) }}
	{!! Form::text('url', null, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => 'http://example.com', 'required' => 'required')) !!}
    
    {{ Form::submit('SUBMIT', array('class' => 'uk-button uk-button-text uk-align-right')) }}
{!! Form::close() !!}