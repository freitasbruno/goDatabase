<div>
    <div class="uk-card uk-card-default uk-card-hover uk-margin-small uk-box-shadow-medium itemCard">
    	<div class="uk-card-header uk-padding-remove toggleWrapper">
	    	<div id="itemBtn{!! $item->id !!}" class="uk-grid-small uk-flex-middle uk-visible-toggle togglePanel" uk-grid>
	            <div class="uk-width-auto uk-margin-left">
	                <span uk-icon="icon: {!! Item::$icons[$item->type] !!}"></span>
	            </div>
	            <div class="uk-width-expand uk-padding-small">
	                <h5 class="uk-margin-remove-bottom uk-text-uppercase">{!! $item->name !!}</h5>
	            </div>
	            <div class="uk-width-auto uk-margin-right">
		        	<ul class="uk-invisible-hover uk-iconnav">
		        		<li><a href="#" id="editItemBtn{!! $item->id !!}" class="uk-icon-link uk-align-right uk-margin-remove uk-invisible-hover preventScroll toggleBtn" uk-icon="icon: pencil"></a></li>
		        		<li><a href="#" class="uk-icon-link uk-align-right uk-margin-remove uk-invisible-hover preventScroll" uk-icon="icon: move" type="button" uk-toggle="target: #modal-close"></a></li>
			        	<li><a href="/cloneItem/{!! $item->id !!}" class="uk-icon-link uk-align-right uk-margin-remove uk-invisible-hover" uk-icon="icon: copy"></a></li>
			            <li><a href="/deleteItem/{!! $item->id !!}" class="uk-icon-link uk-align-right uk-margin-remove uk-invisible-hover" uk-icon="icon: trash"></a></li>
			        </ul>
			    </div>
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
	    @endif
    </div>
</div>