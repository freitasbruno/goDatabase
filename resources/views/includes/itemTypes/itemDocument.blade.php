<div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin-remove" uk-grid>
    <div class="uk-card-media-left uk-cover-container">
        <img src="{!! asset('/images/bg/bg_0' . rand(1,5) . '.jpg') !!}" alt="" uk-cover>
        <canvas width="600" height="400"></canvas>
    </div>
    <div class="toggleWrapper">
	    <div>
	        <div class="uk-card-body togglePanel">
	            <h3 class="uk-card-title toggleTextEdit">Media Left</h3>
	            <p class="documentText">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 
	            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
	            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu 
	            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
	            deserunt mollit anim id est laborum."</p>
	        </div>
	        <div class="uk-card-body uk-hidden togglePanel">
	        	@include('forms/formNewAppTextarea')
	        </div>
	    </div>
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
	</div>
</div>