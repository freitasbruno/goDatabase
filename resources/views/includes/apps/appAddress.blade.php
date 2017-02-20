<span class="uk-visible-toggle uk-text-center toggleForm">
	<span class="uk-text-meta">
		@if (isset($app->description))
			{!! $app->description !!}
		@else
			Address
		@endif
	</span>
	<a href="#" class="uk-icon-link uk-margin-small-left uk-hidden-hover toggleFormBtn preventScroll" uk-icon="icon: pencil; ratio:0.7"></a>
	<a href="{{ URL::to('/deleteAppAddress/' . $app->id) }}" class="uk-icon-link uk-hidden-hover" uk-icon="icon: trash; ratio:0.7"></a>
	<br>
	{!! $app->address01 !!}
	@if (!empty($app->address02))
		{!! ', ' . $app->address02 !!}
	@endif
	<br>
	@if (!empty($app->address03))
		{!! $app->address03 . ', ' !!}
		<br>
	@endif
	{!! $app->city . ', ' . $app->country !!}
	
</span>
<div class="uk-hidden toggleForm">

{!! Form::open(array('url' => 'updateAppAddress/' . $app->id, 'class' => 'uk-form')) !!}
	
	{{ Form::label('description', 'Description', ['class' => 'uk-form-label']) }}
	{!! Form::text('description', $app->description, array('class' => 'uk-input uk-background-muted  uk-margin-small-top uk-margin-small-bottom', 'placeholder' => 'Home Address', 'required' => 'required')) !!}
	
	{{ Form::label('address', 'Address', ['class' => 'uk-form-label']) }}
	{!! Form::text('address01', $app->address01, array('class' => 'uk-input uk-background-muted  uk-margin-small-top', 'placeholder' => 'Address line 1')) !!}
	{!! Form::text('address02', $app->address02, array('class' => 'uk-input uk-background-muted  uk-margin-small-top', 'placeholder' => 'Address line 2')) !!}
	{!! Form::text('address03', $app->address03, array('class' => 'uk-input uk-background-muted  uk-margin-small-top', 'placeholder' => 'Address line 3')) !!}
	{!! Form::text('city', $app->city, array('class' => 'uk-input uk-background-muted uk-margin-small-top', 'placeholder' => 'City', 'required' => 'required')) !!}
	{{ Form::select('country', ['selected'=>$app->country] + Country::countryArray(), null, ['class' => 'uk-select uk-background-muted uk-margin-small-top selectField', 'required' => 'required']) }}
	<span class="uk-width-1-1">
    	<a href="#" class="uk-button uk-button-text uk-align-left preventScroll toggleFormBtn">Close form</a>
    	{{ Form::submit('SUBMIT', array('class' => 'uk-button uk-button-text uk-align-right')) }}
    </span>
{!! Form::close() !!}
</div>
