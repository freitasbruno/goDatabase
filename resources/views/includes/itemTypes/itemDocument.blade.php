<div class="uk-card uk-card-default uk-margin-remove" uk-grid>
	@each('includes/apps/appImage', $item->apps['Image'], 'app')
    <div class="toggleWrapper uk-padding-small uk-margin-remove">
        <div class="uk-margin-small-bottom togglePanel">
			@foreach ($item->apps['Textarea'] as $app)
				@include('includes/apps/appTextarea', ['app' => $app])
			@endforeach
			@foreach ($item->apps['File'] as $app)
				@include('includes/apps/appFile', ['app' => $app])
			@endforeach
        </div>
        <div class="uk-hidden togglePanel">
        	@include('forms/formUpdateAppTextarea', ['app' => $item->apps['Textarea']])
        </div>
	    @if($item->privileges != 'view')
		    <div class="toggleWrapper">
		    	<div class="togglePanel">
		        	<a href="#" class="uk-link-reset uk-text-small preventScroll toggleBtn">
		    	    	<span class="uk-margin-small-right" uk-icon="icon: plus-circle; ratio:0.8"></span>
		    	    	<span>Add files</span>
		    	    </a>
			    </div>
			    @include('forms/formsItemDocument')
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
