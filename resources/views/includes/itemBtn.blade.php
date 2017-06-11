<div>
    <div class="uk-card uk-card-default uk-card-hover uk-margin-small uk-box-shadow-medium itemCard">
    	<div class="uk-card-header uk-padding-remove">
	    	<div id="itemBtn{!! $item->id !!}" class="uk-grid-small uk-flex-middle" uk-grid>
	            <div class="uk-width-auto uk-margin-left">
	                <span uk-icon="icon: {!! Item::$icons[$item->type] !!}"></span>
	                @if($item->privileges != 'owner')
	                	<span title="You can {!! $item->privileges !!} this item" uk-tooltip uk-icon="icon: social"></span>
	                @endif
	            </div>
	            <div class="uk-width-expand uk-padding-small">
					<a href="{{ URL::to('/groups/' . $item->id_parent) }}" class="uk-link-reset">
	                	<h5 class="uk-margin-remove-bottom uk-text-uppercase">{!! $item->name !!}</h5>
					</a>
	            </div>
			</div>
		</div>
	</div>
</div>
