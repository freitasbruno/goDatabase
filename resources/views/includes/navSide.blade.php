<div id="offcanvas-slide" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar">
        <ul class="uk-nav uk-nav-default">
	        <li class="uk-nav-header">Main Menu</li>
	        <li><a href="{{ url('/home') }}">HOME</a></li>
            <li><a href="{{ url('/about') }}">ABOUT</a></li>
        	@if(is_null(session()->get('user_id')))
        		<li><a href="{{ url('/register') }}">REGISTER</a></li>
        		<li><a href="{{ url('/login') }}">LOGIN</a></li>
            @else
            	<li><a href="{{ url('/projects') }}">PROJECTS</a></li>
        		<li><a href="{{ url('/logout') }}">LOGOUT</a></li>
            @endif
	        <li class="uk-nav-divider"></li>
	        <li><a href="#">Item</a></li>
	    </ul>
    </div>
</div>