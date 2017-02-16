<div class="uk-visible-toggle uk-text-center togglePanel">
	{!! '(' . $app->description . ') ' !!}
	<a class="uk-link-reset" href="tel:{!! $app->country_code . $app->number !!}">{!! $app->country_code . ' ' . $app->number !!}</a>
	@if(isset($app->extension))
		{!! ' - ' . $app->extension !!}
	@endif
	<a href="#" class="uk-icon-link uk-margin-small-left uk-hidden-hover toggleBtn preventScroll" uk-icon="icon: pencil; ratio:0.7"></a>
	<a href="/deleteAppPhone/{!! $app->id !!}" class="uk-icon-link uk-hidden-hover" uk-icon="icon: trash; ratio:0.7"></a>
	<br>
</div>
<div class="uk-hidden togglePanel">
{!! Form::open(array('url' => 'updateAppPhone/' . $app->id, 'class' => 'uk-form')) !!}
	
	{{ Form::label('description', 'Description', ['class' => 'uk-form-label']) }}
	{!! Form::text('description', $app->description, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => 'Mobile', 'required' => 'required')) !!}
	
	{{ Form::label('country_code', 'Country Code', ['class' => 'uk-form-label']) }}
	{{ Form::select('country_code', ['selected'=>$app->country_code] + Country::countryCodesArray(), null, ['class' => 'uk-select uk-background-muted selectField', 'required' => 'required']) }}
	
	{{ Form::label('number', 'Phone Number', ['class' => 'uk-form-label']) }}
	{!! Form::text('number', $app->number, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom toggleField', 'placeholder' => '981276345', 'required' => 'required')) !!}
	
	{{ Form::label('extension', 'Extension', ['class' => 'uk-form-label']) }}
	{!! Form::text('extension', $app->extension, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => '33')) !!}
    
    {{ Form::submit('SUBMIT', array('class' => 'uk-button uk-button-text uk-align-right')) }}
{!! Form::close() !!}
</div>