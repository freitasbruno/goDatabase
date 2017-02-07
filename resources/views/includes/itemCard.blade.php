<div>
    <div class="uk-card uk-card-default uk-card-hover uk-margin-small uk-box-shadow-medium">
    	<div id="itemBtn{!! $item->id !!}" class="uk-grid-small uk-flex-middle uk-visible-toggle" uk-grid>
            <div class="uk-width-auto uk-margin-left">
                <span uk-icon="icon: user; ratio:0.7"></span>
            </div>
            <div class="uk-width-expand uk-padding-small">
                <h5 class="uk-margin-remove-bottom uk-text-uppercase">{!! $item->name !!}</h5>
            </div>
            <div class="uk-width-auto uk-margin-right">
	        	<ul class="uk-hidden-hover uk-iconnav">
		        	<li><a href="#" id="editItemBtn{!! $item->id !!}" class="uk-icon-link uk-align-right uk-margin-remove uk-invisible-hover editItemBtn" uk-icon="icon: pencil"></a></li>
		            <li><a href="/deleteItem/{!! $item->id !!}" class="uk-icon-link uk-align-right uk-margin-remove uk-invisible-hover" uk-icon="icon: trash"></a></li>
		        </ul>
		    </div>
		</div>
		<div id="itemBtnForm{!! $item->id !!}" class="itemBtnForm uk-hidden">
	    	@include('forms/formUpdateItem')
	    </div>    
    </div>
</div>