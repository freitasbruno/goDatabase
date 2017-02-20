<div class="uk-visible-toggle toggleForm">
	<a class="uk-link-reset" href="{!! $app->url !!}" target="blank">
	{!! $app->url !!}
	</a>
	<a href="#" class="uk-icon-link uk-margin-small-left uk-hidden-hover toggleFormBtn preventScroll" uk-icon="icon: pencil; ratio:0.7"></a>
	<a href="{{ URL::to('/deleteAppWebsite/' . $app->id) }}" class="uk-icon-link uk-hidden-hover" uk-icon="icon: trash; ratio:0.7"></a>
</div>
<div class="uk-hidden toggleForm">
{!! Form::open(array('url' => 'updateAppWebsite/' . $app->id, 'class' => 'uk-form')) !!}
	
	{{ Form::label('name', 'Website Name', ['class' => 'uk-form-label']) }}
	{!! Form::text('name', $app->name, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => 'Example Inc.', 'required' => 'required')) !!}
	
	{{ Form::label('url', 'Website URL', ['class' => 'uk-form-label']) }}
	{!! Form::text('url', $app->url, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => 'http://example.com', 'required' => 'required')) !!}
    
    {{ Form::submit('SUBMIT', array('class' => 'uk-button uk-button-text uk-align-right')) }}
{!! Form::close() !!}	
</div>