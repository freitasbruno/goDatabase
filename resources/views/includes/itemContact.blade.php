<div class="uk-card uk-padding-remove">
	<div class="uk-padding-small">
		<div class="uk-card uk-card-body uk-padding-small">
			<p class="uk-text-small uk-pa">
			@foreach(Item::$appModels as $appClass => $appName)
				@if (count($item->apps[$appName]) > 0)
					{!! $appName . " " . count($item->apps[$appName]) !!}<br>
					@each('includes/'.lcfirst($appClass), $item->apps[$appName], 'app')
					<br>
				@endif
			@endforeach
	    	</p>
	    </div>
	    <div class="uk-padding-small toggleWrapper">
	    	<a href="#" class="uk-link-reset toggleBtn">
		    	<span class="uk-margin-small-right " uk-icon="icon: plus-circle"></span>Add Contact Information
		    </a>
		    @include('forms/formsItemContact')
	    </div>
	</div>
</div>