@extends('layouts.app')

@section('title', 'Free showcase')

@section('content')

  <div class="plain-footer-container showcase-page single-page-style">

    <div class="with-plain-footer">

      <nav class="left-navbar">
        <div class="left-navbar-inner">
          <ul>
            <li class="main-logo">
              <a href="{{url('/')}}"><img src="{{asset('images/slogo.png')}}"></a>
            </li>
          </ul>
          <!-- profile -->
          <ul class="profile">
            <li>
              <a class="profile-trigger">
                @foreach($showcases as $showcase)
                  <img src="/avatar/{{$showcase->user_image}}" class="nav-avatar">
                @endforeach
              </a>
            </li>
          </ul>

        </div>
      </nav>

      <div class="showcase-area">
        @foreach($showcases as $showcase)
            <img src="/myshowcase/{{$showcase->image}}">
        @endforeach
      </div>

    </div>
    <!-- container ends -->

  </div>


@endsection

@section('scripts')
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123989535-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-123989535-1');
  </script>
@endsection
