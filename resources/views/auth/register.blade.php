@extends('layouts.app')

@section('title', 'Create new account')

@section('content')
  <div class="columns login-page">

      <div class="column is-8 image-area-sidebar is-hidden-mobile">
          <div class="login-top-text has-text-centered">
            <h1>Join the community </h1>
            <p>Create your account, it takes less than a minute.</p>
          </div>
          <div class="login-background-image">
            <img src="{{asset('images/head.jpg')}}" alt="bybu.cc">
          </div>
      </div>

      <div class="column is-4 input-sidebar">
        <div class="column is-10 is-offset-1">
          <div class="logo">
            <a href="/"><img src="{{asset('images/t-logo.png')}}" alt="bybu.cc"></a>
          </div>

          <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
            {{ csrf_field() }}
            <div class="field">
              <b-field label="Your Name">
                  <b-input
                      name="name"
                      type="text"
                      icon="fas fa fa-user"
                      placeholder="Your Name"
                      required>
                  </b-input>
              </b-field>
            </div>

            <div class="field">
              <b-field label="Email">
                  <b-input
                      name="email"
                      type="email"
                      icon="fas fa fa-envelope"
                      placeholder="Your email"
                      required>
                  </b-input>
              </b-field>
            </div>

            <div class="field">
              <b-field label="Password">
                  <b-input
                      type="password"
                      name="password"
                      icon="fas fa fa-key"
                      password-reveal
                      placeholder="Your password"
                      required>
                  </b-input>
              </b-field>
            </div>

            <div class="field">
              <b-field label="Confirm Password">
                  <b-input
                      type="password"
                      name="password_confirmation"
                      icon="fas fa fa-key"
                      password-reveal
                      placeholder="confirm password"
                      required>
                  </b-input>
              </b-field>
            </div>

            <div class="field">
              <p class="control">
                <button class="login-btn button is-block is-info is-medium is-fullwidth">
                  {{ __('Register') }}
                </button>
              </p>
            </div>
          </form>

          <div class="login-btn-in-signup">
            <p>Already have an account ?
              <a href="{{url('/login')}}" name="button">Login</a>
            </p>
          </div>

        </div>
      </div>

  </div>
@endsection
