<!-- Navigation -->
<nav class="uk-navbar-container" uk-navbar>
    <!-- left -->
    <div class="uk-navbar-left">
    	<div class="uk-logo">
	    	<a class="uk-navbar-item uk-logo" href="/home">GO DATABASE</a>
    	</div>
    </div>
    <!-- right -->
    <div class="uk-navbar-right uk-visible@s">
        <ul class="uk-navbar-nav">
            <li><a href="{{ url('/home') }}">HOME</a></li>
        	@if (Auth::guest())
        		<li><a href="{{ url('/register') }}">REGISTER</a></li>
        		<li><a href="{{ url('/login') }}">LOGIN</a></li>
            @else
        		<li>
        			<a href="{{ url('/logout') }}"
	        			onclick="event.preventDefault();
	                        document.getElementById('logout-form').submit();">
	                        LOGOUT
	                </a>
	                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
	                    {{ csrf_field() }}
	                </form>
                </li>
            @endif
        </ul>
    </div>
    <div class="uk-navbar-right uk-hidden@s">
	    <a class="uk-navbar-toggle" href="#offcanvas-slide" uk-toggle>
            <span uk-navbar-toggle-icon></span><span class="uk-margin-small-left">Menu</span>
        </a>
    </div>
</nav>