@extends('layouts.masterBgImage')

@section('content')
	<div class="uk-section uk-text-center">
    	<div class="uk-container">
			<div class="uk-card uk-card-default uk-width-1-4@m uk-position-center">
			    <div class="uk-card-header uk-card-secondary uk-padding-small">
			        <h3 class="uk-card-title">LOGIN</h3>
			    </div>
			    <div class="uk-card-body uk-padding-small">
					{!! Form::open(array('url' => 'login', 'class' => 'uk-form')) !!}
						{!! Form::email('email', '', array('class' => 'uk-input uk-margin-small', 'placeholder' => 'Email Address', 'required' => 'required')) !!}
						@if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
						{!! Form::password('password', array('class' => 'uk-input uk-margin-small', 'placeholder' => 'Password', 'required' => 'required')) !!}
						@if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
						{!! Form::submit('GO!', array('class' => 'uk-margin-small uk-button uk-button-default uk-width-1-1 uk-button-primary')) !!}
					{!! Form::close() !!}
			    </div>
			    <div class="uk-card-footer">
			        <a href="{{ URL::to('register') }}" >Don't have a username? Register here!</a>
			    </div>
			</div>
	    </div>
	</div>
@endsection
