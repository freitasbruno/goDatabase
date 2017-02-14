<div class="uk-animation-fade uk-hidden togglePanel">
    <ul class="uk-iconnav uk-margin-top" uk-tab>
    	@foreach(ItemDocument::$appModels as $appClass => $appName)
	    <li><a href="#" uk-icon="icon: {!! ItemDocument::$icons[$appClass] !!}"></a></li>
	    @endforeach
	</ul>
	<ul class="uk-switcher">
		@foreach(ItemDocument::$appModels as $appClass => $appName)
			<li>
		    	<div>
					<div class="uk-card uk-margin-top">
						<p class="uk-text-center uk-text-uppercase">{!! 'NEW ' . $appName !!}</p>
						@include('forms/formNew' . $appClass)
					</div>
				</div>
		    </li>
		@endforeach
	</ul>
	<hr class="uk-invisible">
</div>
			
			
			
			
			