<span>
	{!! '(' . $app->description . ') ' !!}
	<a class="uk-link-reset" href="tel:{!! $app->country_code . $app->number !!}">{!! $app->country_code . ' ' . $app->number !!}</a>
	@if(isset($app->extension))
		{!! ' - ' . $app->extension !!}
	@endif
</span>
