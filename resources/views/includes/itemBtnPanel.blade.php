<div class="toggleWrapper">
	<div class="uk-padding-small uk-margin-bottom itemTypePanel">
		<div class="uk-card-header uk-padding-remove">
	        <h5>{!! $type !!}
	        <span class="uk-align-right togglePanel">
		    	<a href="#" class="uk-icon-link uk-align-right uk-margin-remove preventScroll toggleBtn" uk-icon="icon: triangle-up; ratio:1.4"></a>
		    </span>
		    <span class="uk-align-right uk-hidden togglePanel">
		    	<a href="#" class="uk-icon-link uk-align-right uk-margin-remove preventScroll toggleBtn" uk-icon="icon: triangle-down; ratio:1.4"></a>
		    </span>
		    </h5>
	    </div>
		<div class="uk-card-body togglePanel">
		@if ($type == 'GENERIC')
			<div class="uk-child-width-1-1" uk-grid>
	    @elseif ($type == 'CONTACT')
	    	<div class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@l" uk-grid>
	    @elseif ($type == 'TASK LIST')
	    	<div class="uk-child-width-1-1" uk-grid>
	    @elseif ($type == 'LIST')
	    	<div class="uk-child-width-1-1" uk-grid>
	    @elseif ($type == 'CALENDAR EVENT')
	    	<div class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@l" uk-grid>
	    @elseif ($type == 'TIMER')
	    	<div class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@l" uk-grid>
	    @elseif ($type == 'DOCUMENT')
	    	<div class="uk-child-width-1-1@s uk-child-width-1-3@m uk-child-width-1-4@l" uk-grid>
	    @endif
				@each('includes/itemBtn', $items[$type], 'item')						
			</div>
	    </div>
	</div>
</div>
