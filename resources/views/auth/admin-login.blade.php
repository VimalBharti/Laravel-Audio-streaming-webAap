@extends('layouts.app')

@section('content')
  <div class="columns login-page">
    <div class="column is-12 is-vertical-center login-fields">
      <div class="column is-4 is-offset-4">
        <h2>Admin</h2>
        <div class="logo">
          <a href="{{url('/')}}"><img src="{{asset('images/logo.png')}}" alt="bybu.cc"></a>
        </div>

        <form method="POST" action="{{ route('admin.login.submit') }}" aria-label="{{ __('Login') }}">
          {{ csrf_field() }}
          <div class="field">
            <p class="control has-icons-left has-icons-right">
              <input class="input is-large {{$errors->has('email') ? 'is-danger' : '' }}" type="email" placeholder="Email" value="{{ old('email') }}" name="email" autofocus="" required>
              <span class="icon is-medium is-left">
                <i class="fa fa-envelope"></i>
              </span>
              <span class="icon is-small is-right">
                <i class="fa fa-check"></i>
              </span>
            </p>
          </div>

          <div class="field">
            <p class="control has-icons-left has-icons-right">
              <input class="input is-large {{$errors->has('password') ? 'is-danger' : '' }}" type="password" placeholder="Password" name="password" required>
              <span class="icon is-medium is-left">
                <i class="fa fa-lock"></i>
              </span>
              <span class="icon is-small is-right">
                <i class="fa fa-eye"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <label class="checkbox">
              <input type="checkbox">
              Remember me
            </label>
            <p class="control">
              <button class="button is-block is-info is-large is-fullwidth">
                Login
              </button>
            </p>
            <p class="has-text-grey">
                <a href="{{route('register')}}">Sign Up</a> &nbsp;·&nbsp;
                <a href="{{route('password.request')}}">Forgot Password</a> &nbsp;·&nbsp;
                <a href="../">Need Help?</a>
            </p>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection
