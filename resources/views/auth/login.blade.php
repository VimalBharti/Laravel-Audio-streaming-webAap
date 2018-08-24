@extends('layouts.app')

@section('title', 'Login')

@section('content')
  <div class="columns login-page">

      <div class="column is-8 image-area-sidebar is-hidden-mobile">
        <div class="login-top-text has-text-centered">
          <h1>Start designing now </h1>
          <p>Create your account, it takes less than a minute. if you already have an account than login.</p>
          <a href="{{url('/register')}}">Register Now</a>
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

          <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
            {{ csrf_field() }}

            <div class="field">
              <p class="control has-icons-left has-icons-right">
                <input class="input is-medium {{$errors->has('email') ? 'is-danger' : '' }}" type="email" placeholder="Email" value="{{ old('email') }}" name="email" autofocus="" required>

                <span class="icon is-medium is-left">
                  <i class="fa fa-envelope"></i>
                </span>
                <span class="icon is-small is-right">
                  <i class="fa fa-check"></i>
                </span>
              </p>
            </div>

            <!-- Store previous location -->
            <div class="form-group">
                @if (Request::has('previous'))
                    <input type="hidden" name="previous" value="{{ Request::get('previous') }}">
                @else
                    <input type="hidden" name="previous" value="{{ URL::previous() }}">
                @endif
            </div>
            <!-- Store previous location end -->

            <div class="field">
              <p class="control has-icons-left has-icons-right">
                <input class="input is-medium {{$errors->has('password') ? 'is-danger' : '' }}" type="password" placeholder="Password" name="password" required>
                <span class="icon is-medium is-left">
                  <i class="fa fa-lock"></i>
                </span>
                <span class="icon is-small is-right">
                  <i class="fa fa-eye"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <!-- <label class="checkbox">
                <input type="checkbox">
                Remember me
              </label> -->
              <p class="control">
                <button class="login-btn button is-block is-info is-medium is-fullwidth">
                  Login
                </button>
              </p>
              <p class="has-text-grey is-clearfix">
                <span class="is-pulled-left">
                  <a class="log-link" href="{{route('register')}}">Don't have an account ?</a>
                </span>
                <span class="is-pulled-right">
                  <a class="log-link" href="{{route('password.request')}}">Forgot Password</a>
                </span>
              </p>
            </div>

          </form>
        </div>
      </div>
      <!-- is-5 ends -->

  </div>
@endsection
