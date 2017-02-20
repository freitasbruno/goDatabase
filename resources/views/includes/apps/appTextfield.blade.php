<div class="uk-visible-toggle toggleForm">
	<span class="uk-text-meta">{!! $app->description !!}</span>
	<br>
	{!! $app->text !!}
	<a href="#" class="uk-icon-link uk-margin-small-left uk-hidden-hover toggleFormBtn preventScroll" uk-icon="icon: pencil; ratio:0.7"></a>
	<a href="{{ URL::to('/deleteAppTextfield/' . $app->id) }}" class="uk-icon-link uk-hidden-hover" uk-icon="icon: trash; ratio:0.7"></a>
	<br>
</div>
<div class="uk-hidden toggleForm">
{!! Form::open(array('url' => 'updateAppTextfield/' . $app->id, 'class' => 'uk-form')) !!}
	
	{{ Form::label('description', 'Description', ['class' => 'uk-form-label']) }}
	{!! Form::text('description', $app->description, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => 'Company Name', 'required' => 'required')) !!}
	
	{{ Form::label('name', 'Additional Information', ['class' => 'uk-form-label']) }}
	{!! Form::text('name', $app->text, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom toggleField', 'placeholder' => 'Company Name', 'required' => 'required')) !!}
    
    {{ Form::submit('SUBMIT', array('class' => 'uk-button uk-button-text uk-align-right')) }}
{!! Form::close() !!}
</div>