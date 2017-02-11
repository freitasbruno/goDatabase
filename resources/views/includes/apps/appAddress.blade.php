<span>
	<span class="uk-text-meta">
		@if (isset($app->description))
			{!! $app->description !!}
		@else
			Address
		@endif
	</span>
	<br>
	{!! $app->address01 . ', ' . $app->address02 !!}
	<br>
	{!! $app->address03 . ', ' . $app->city . ', ' . $app->country !!}
</span>
