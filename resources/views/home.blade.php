@extends('layouts.master')

@section('header')

	<div class="uk-section uk-section-media uk-dark uk-background-cover" style="background-image: url('{!! asset('/images/bg/bg_0'.rand(1, 5).'.jpg') !!}');" uk-height-viewport="expand: true">
		
    </div>

@stop

@section('content')

	<div class="uk-section uk-section-secondary uk-text-center">
    	<div class="uk-container uk-container-small">
			<h3>WHAT'S NEW?</h3>
			<h4 class="uk-margin">Welcome to version 1.0 - There are a lot of new and exiting features.</h4>
		</div>
	</div>

@stop
