{!! Form::open(array('url' => 'newAppPhone', 'class' => 'uk-form')) !!}
	{{ Form::hidden('item_id', $item->id) }}
	
	{{ Form::label('description', 'Description', ['class' => 'uk-form-label']) }}
	{!! Form::text('description', null, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => 'Mobile', 'required' => 'required')) !!}
	
	{{ Form::label('country_code', 'Country Code', ['class' => 'uk-form-label']) }}
	{!! Form::text('country_code', null, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => '+351', 'required' => 'required')) !!}
	
	{{ Form::label('number', 'Phone Number', ['class' => 'uk-form-label']) }}
	{!! Form::text('number', null, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => '981276345', 'required' => 'required')) !!}
	
	{{ Form::label('extension', 'Extension', ['class' => 'uk-form-label']) }}
	{!! Form::text('extension', null, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => '33')) !!}
    
    {{ Form::submit('SUBMIT', array('class' => 'uk-button uk-button-text uk-align-right')) }}
{!! Form::close() !!}