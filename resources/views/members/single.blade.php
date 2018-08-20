@extends('layouts.app')

@section('title', 'Free')

@section('content')

  <div class="menu-bar">

  </div>

  <div class="single-design-page">

    <div class="container">
      <div class="featured-image-single has-text-centered">
        <img src="/uploads/design/{{ $single->image }}" class="is-fullheight is-fullwidth">
      </div>

      <section>
        
      </section>

      <div class="content posted-by-single-page">
        <p><i class="fa fa-edit"></i> Submitted By:
          <strong><a href="/profile/{{$single->user_slug}}">{{$single->user_name}}</a></strong>
        </p>
        @if(isset($single->credit))
        <p><i class="fa fa-edit"></i> Design By:
          <strong><a href="{{$single->url}}" target="_blank">{{$single->credit}}</a></strong>
        </p>
        @endif
      </div>

    </div>
    <!-- container ends -->
  </div>

  @include('pages.join-com')

  @include('_partials.footer')

@stop
