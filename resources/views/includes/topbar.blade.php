<div class="uk-grid uk-margin-remove" uk-grid>
	<div class="uk-width-3-4 uk-width-1-3@s uk-width-1-5@m uk-width-1-6@l uk-padding-remove">
		<div class="uk-logo uk-light topNav">
	    	<a class="uk-navbar-item uk-logo" href="/home"><span class="uk-margin-right" uk-icon="icon: user"></span>{!! Auth::user()->name !!}</a>
    	</div>
	</div>
	<div class="uk-width-expand uk-padding-remove uk-margin-remove uk-light topNav">
		@include('includes/nav')
	</div>	
</div>