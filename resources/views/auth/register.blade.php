@extends('layouts.masterBgImage')

@section('content')
	<div class="uk-section uk-text-center">
    	<div class="uk-container">
			<div class="uk-card uk-card-default uk-card-hover uk-width-1-4@m uk-position-center">
			    <div class="uk-card-header uk-card-secondary uk-padding-small">
			        <h3 class="uk-card-title">REGISTER</h3>
			    </div>
			    <div class="uk-card-body uk-padding-small">
					{!! Form::open(array('url' => 'register', 'class' => 'uk-form')) !!}
						{!! Form::text('name', '', array('class' => 'uk-input uk-margin-small', 'placeholder' => 'User Name', 'required' => 'required', 'autofocus' => 'autofocus')) !!}
						@if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
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
                        {!! Form::password('password_confirmation', array('class' => 'uk-input uk-margin-small', 'placeholder' => 'Confirm your Password', 'required' => 'required')) !!}
						{!! Form::submit('GO!', array('class' => 'uk-margin-small uk-button uk-button-default uk-width-1-1 uk-button-primary')) !!}
					{!! Form::close() !!}
			    </div>
			    <div class="uk-card-footer">
			        <a href="{{ URL::to('login') }}">Already a user? Login here!</a>
			    </div>
			</div>
	    </div>
	</div>
@endsection
