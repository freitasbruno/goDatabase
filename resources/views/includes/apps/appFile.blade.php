<span class="uk-visible-toggle togglePanel">
	<a href="{!! asset('/uploads/' . $app->name) !!}" download="{!! $app->originalName !!}" class="uk-link-reset" target="blank"  uk-icon="icon: download"></a>
	<a href="{!! asset('/uploads/' . $app->name) !!}" class="uk-link-reset" target="blank">
		{!! $app->originalName !!}
	</a>
	<a href="{{ URL::to('/deleteApFile/' . $app->id) }}" class="uk-icon-link uk-hidden-hover" uk-icon="icon: trash; ratio:0.7"></a>
</span><br>