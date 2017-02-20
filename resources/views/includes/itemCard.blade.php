<div>
    <div class="uk-card uk-card-default uk-card-hover uk-margin-small uk-box-shadow-medium itemCard">
    	<div class="uk-card-header uk-padding-remove toggleWrapper">
	    	<div id="itemBtn{!! $item->id !!}" class="uk-grid-small uk-flex-middle togglePanel" uk-grid>
	            <div class="uk-width-auto uk-margin-left">
	                <span uk-icon="icon: {!! Item::$icons[$item->type] !!}"></span>
	                @if($item->privileges != 'owner')
	                	<span title="You can {!! $item->privileges !!} this item" uk-tooltip uk-icon="icon: social"></span>
	                @endif
	            </div>
	            <div class="uk-width-expand uk-padding-small">
	                <h5 class="uk-margin-remove-bottom uk-text-uppercase toggleTextEdit">{!! $item->name !!}</h5>
	            </div>
	            @if($item->id_parent == auth::user()->id_trash_group)
	            	<div class="uk-width-auto uk-margin-right">
				        <ul class="uk-iconnav uk-align-right">
	            			<li><a href="{{ URL::to('/restoreItem/' . $item->id) }}" class="uk-icon-link uk-align-right uk-margin-remove" uk-icon="icon: refresh"></a></li>
			        	</ul>
				    </div>
	            @elseif($item->privileges != 'view')
	            	<div class="uk-width-auto uk-margin-right toggleIconWrapper">
			        	<ul class="uk-iconnav uk-hidden toggleIconNav">
			        		<li><a href="#" id="editItemBtn{!! $item->id !!}" class="uk-icon-link uk-align-right uk-margin-remove preventScroll toggleBtn" uk-icon="icon: pencil"></a></li>
			        		<li><a href="#" name="{!! $item->id !!}" class="uk-icon-link uk-align-right uk-margin-remove preventScroll moveBtn" uk-icon="icon: move" type="button" uk-toggle="target: #modal-move-item"></a></li>
				        	<li><a href="{{ URL::to('/cloneItem/' . $item->id) }}" class="uk-icon-link uk-align-right uk-margin-remove" uk-icon="icon: copy"></a></li>
				        	<li><a href="#" name="{!! $item->id !!}" class="uk-icon-link uk-align-right uk-margin-remove preventScroll shareBtn" uk-icon="icon: social" type="button" uk-toggle="target: #modal-share-item"></a></li>
				            <li><a href="{{ URL::to('/deleteItem/' . $item->id) }}" class="uk-icon-link uk-align-right uk-margin-remove" uk-icon="icon: trash"></a></li>
				        	<li><a href="#" class="uk-icon-link uk-align-right uk-margin-remove preventScroll toggleIconClose" uk-icon="icon: more"></a></li>
				        </ul>
				        <ul class="uk-iconnav uk-align-right toggleIconNav">
	            			<li><a href="#" class="uk-icon-link uk-align-right uk-margin-remove preventScroll toggleIcon" uk-icon="icon: more-vertical"></a></li>
	            			<li><a href="#" class="uk-icon-link uk-align-right uk-margin-remove preventScroll uk-hidden toggleIcon" uk-icon="icon: more"></a></li>
			        	</ul>
				    </div>
				@endif
			</div>
			<div id="itemBtnForm{!! $item->id !!}" class="uk-hidden togglePanel">
	    		@include('forms/formUpdateItem')
		    </div>
	    </div>
	    @if ($item->type == 'GENERIC')
	    @elseif ($item->type == 'CONTACT')
	    	@include('includes/itemTypes/itemContact')
	    @elseif ($item->type == 'TASK LIST')
	    	@include('includes/itemTypes/itemTaskList')
	    @elseif ($item->type == 'LIST')
	    @elseif ($item->type == 'CALENDAR EVENT')
	    @elseif ($item->type == 'TIMER')
	    @elseif ($item->type == 'DOCUMENT')
	    	@include('includes/itemTypes/itemDocument')
	    @endif
    </div>
</div>