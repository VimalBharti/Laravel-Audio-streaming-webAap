@extends('layouts.app')

@section('content')

<div class="columns login-page">
  <div class="column is-12 is-vertical-center login-fields">

    <div class="column is-8 image-area-sidebar is-hidden-mobile">
      <div class="login-top-text has-text-centered">
        <h1>Start designing now </h1>
        <p>Become one of our loyal cutomers and get access to ressources, tutorials, and of course customer support.</p>
      </div>
      <div class="login-background-image">
        <img src="{{asset('images/head.jpg')}}">
      </div>
    </div>

    <div class="column is-4 input-sidebar">
      <div class="column is-10 is-offset-1">

        <div class="logo">
          <a href="/"><img src="{{asset('images/t-logo.png')}}" alt="bybu.cc"></a>
        </div>

        <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group row">
                <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                <div class="field">
                    <input id="email" type="email" class="input is-medium" name="email" value="{{ $email ?? old('email') }}" placeholder="Email" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="field">
                <label for="password" class="label">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="input is-medium" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="input is-medium" name="password_confirmation" required>
                </div>
            </div>

            <div class="field">
                <button type="submit" class="login-btn button is-block is-info is-medium is-fullwidth">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>

      </div>
    </div>

  </div>
</div>

@endsection
