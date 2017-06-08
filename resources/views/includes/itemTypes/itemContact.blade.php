<div class="uk-card uk-padding-remove">
	<div class="uk-card uk-card-body uk-padding-small">

		<p class="uk-margin-small-bottom uk-text-center">
		@foreach(ItemContact::$appModelsSummary as $appClass => $appName)
			@if (count($item->apps[$appName]) > 0)
				<div class="uk-text-center toggleWrapper">
				@foreach ($item->apps[$appName] as $app)
					@include('includes/apps/'.lcfirst($appClass), ['app' => $app])
				@endforeach
				</div>
			@endif
		@endforeach
    	</p>

    	@if (count($item->apps['Address']) + count($item->apps['Textfield']) > 0)

        <div class="toggleWrapper">
        	<a href="#" class="uk-link-reset uk-text-small preventScroll toggleBtn">
        		<p class="uk-text-center togglePanel"><span class="uk-margin-small-right" uk-icon="icon: chevron-down"></span></p>
        	</a>
    		<div class="uk-hidden togglePanel">
    			<p class="uk-text-small">
	    		@foreach(ItemContact::$appModelsExpand as $appClass => $appName)
	    			@if (count($item->apps[$appName]) > 0)
	    				<div class="toggleWrapper">
						@foreach ($item->apps[$appName] as $app)
							@include('includes/apps/'.lcfirst($appClass), ['app' => $app])
						@endforeach
	    				</div>
	    				<br>
	    			@endif
	    		@endforeach
	        	</p>
	        	<p class="uk-margin-remove-top uk-text-center">
	        		<a href="#" class="uk-link-reset uk-text-small preventScroll toggleBtn">
	        		<span uk-icon="icon: chevron-up"></span>
	        		</a>
	        	</p>
    		</div>
        </div>
        @endif

        @if($item->privileges != 'view')
        <div class="toggleWrapper">
        	<div class="togglePanel">
	        	<a href="#" class="uk-link-reset uk-text-small preventScroll toggleBtn">
	    	    	<span class="uk-margin-small-right" uk-icon="icon: plus-circle; ratio:0.8"></span>
	    	    	<span>Add Contact Information</span>
	    	    </a>
    	    </div>
    	    @include('forms/formsItemContact')
    	    <div class="uk-hidden togglePanel">
	        	<a href="#" class="uk-link-reset uk-text-small preventScroll toggleBtn">
	    	    	<span class="uk-margin-small-right" uk-icon="icon: minus-circle; ratio:0.8"></span>
	    	    	<span>Close forms</span>
	    	    </a>
    	    </div>
        </div>
        @endif
    </div>
</div>
