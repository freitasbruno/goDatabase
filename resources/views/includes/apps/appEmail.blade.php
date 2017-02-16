<span class="uk-visible-toggle togglePanel">
	<b>
	{!! Html::mailto($app->email, null, ['class' => 'uk-link-reset']) !!}
	</b>
	<a href="#" class="uk-icon-link uk-margin-small-left uk-hidden-hover toggleBtn preventScroll" uk-icon="icon: pencil; ratio:0.7"></a>
	<a href="/deleteAppEmail/{!! $app->id !!}" class="uk-icon-link uk-hidden-hover" uk-icon="icon: trash; ratio:0.7"></a>
</span>
<div class="uk-hidden togglePanel">
{!! Form::open(array('url' => 'updateAppEmail/' . $app->id, 'class' => 'uk-form')) !!}
	
	{{ Form::label('description', 'Description', ['class' => 'uk-form-label']) }}
	{!! Form::text('description', $app->description, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => 'Work', 'required' => 'required')) !!}
	
	{{ Form::label('email', 'Email Address', ['class' => 'uk-form-label']) }}
	{!! Form::email('email', $app->email, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom toggleField', 'placeholder' => 'johndoe@example.com', 'required' => 'required')) !!}
    
    {{ Form::submit('SUBMIT', array('class' => 'uk-button uk-button-text uk-align-right')) }}
{!! Form::close() !!}
</div>