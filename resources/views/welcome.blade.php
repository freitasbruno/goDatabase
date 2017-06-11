@extends('layouts.masterBgImage')

@section('content')

	<div class="uk-section uk-light" uk-height-viewport="offset-top: true; offset-bottom: true">

    </div>

	<div class="uk-section uk-section-secondary uk-text-center uk-padding">
    	<div class="uk-container uk-container-small">
			<h3>GO DB . 1.00</h3>
			<a class="uk-button uk-button-default" href="register">REGISTER</a>
			<a class="uk-button uk-button-default" href="login">LOG IN</a>
			<h4 class="uk-margin">
				GO DB is a Personal Database
				<br>It is an application that allows you to store, manage and share information
			</h4>
			<p class="uk-margin-remove">This project is currently available as a Beta release, please report any bugs you might find.</p>
			Bruno Freitas - {!! Html::mailto('freitascbruno@gmail.com', null, ['class' => 'uk-link-reset']) !!}
		</div>
	</div>

@stop
