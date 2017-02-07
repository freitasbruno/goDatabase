<li>
	<h3 class="uk-accordion-title itemBtn">{!! $item->name !!}</h3>
	<div id="itemBtnForm{!! $item->id !!}" class="uk-padding-remove uk-margin-small-right uk-margin-remove uk-hidden itemBtnForm">
		@include('forms/formUpdateItem')
	</div>
    <div class="uk-accordion-content"> 
    	<a href="#" id="editItemBtn{!! $item->id !!}"  class="uk-icon-link editItemBtn">EDIT</a>
    	<a href="/deleteItem/{!! $item->id !!}" class="uk-icon-link">DELETE</a>
        <p> ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
</li>