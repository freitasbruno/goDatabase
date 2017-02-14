<!DOCTYPE html>
<html lang="en">

	@include('includes/head')

	<body>	
		@include('includes/navSide')
		
		@yield('header')
        @yield('content')
	</body>
	
    {!! Html::script('js/go.js') !!}
    
</html>
