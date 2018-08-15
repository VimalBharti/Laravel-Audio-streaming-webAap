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

        <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
            @csrf

            <div class="field">
              <p class="control has-icons-left has-icons-right">
                <input class="input is-medium {{$errors->has('email') ? 'is-danger' : '' }}" type="email" placeholder="Email" value="{{ old('email') }}" id="email" name="email" autofocus="" required>

                <span class="icon is-medium is-left">
                  <i class="fa fa-envelope"></i>
                </span>
              </p>
            </div>

            <div class="field">
                <button type="submit" class="login-btn button is-block is-info is-medium is-fullwidth">
                    {{ __('Send Password Reset Link') }}
                </button>

                <p class="has-text-centered">
                  <a class="log-link" href="{{url('/login')}}">Back to Log in</a>
                </p>

            </div>
        </form>


  </div>
</div>

@endsection
