@extends('layouts.app')

@section('content')

  <div class="showcase-homepage">

    @include('_partials.navbar')

    <section class="hero is-medium is-bold has-text-centered">
      <div class="hero-body">
        <div class="container">
          <h1 class="title text-bold is-2">
            Free Instant Showcase
          </h1>
          <h2 class="subtitle">
            Quickly & simply show flat presentation
          </h2>
          @if(Auth::guest())
            <a href="{{route('me.index')}}" class="button">GET STARTED - FREE FOREVER</a>
          @else
            <a href="{{route('me.index')}}" class="button">Go To Dashboard</a>
          @endif
        </div>
      </div>
      <img src="{{asset('images/head.jpg')}}" alt="">
    </section>

  </div>

  @include('_partials.footer')

@endsection
