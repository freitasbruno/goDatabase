<!DOCTYPE html>
<html lang="en">

	@include('includes/head')

	<body class="uk-background-cover" style="background-image: url('{!! asset('/images/bg/bg_0'.rand(1, 5).'.jpg') !!}');" uk-height-viewport>	

		@include('includes/nav')
		@include('includes/navSide')
	    @yield('content')
	    
	</body>

</html>
