<div>
	<div class="uk-card uk-box-shadow-medium uk-padding-small uk-margin-bottom uk-border-rounded itemTypePanel">
		<div class="uk-card-header uk-padding-remove">
	        <h5>{!! $type !!}</h5>
	    </div>
		<div class="uk-card-body">
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
	    	<div class="uk-child-width-1-1@m uk-child-width-1-2@l" uk-grid>
	    @endif
				@each('includes/itemCard', $items[$type], 'item')						
			</div>
	    </div>
	</div>    
</div>
		    					