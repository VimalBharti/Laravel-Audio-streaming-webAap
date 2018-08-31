@extends('layouts.app')

@section('title', 'Guidelines')

@section('content')

  <div class="menu-bar">
    @include('_partials.navbar')
  </div>

  <section>
    <div class="columns about-us-page">
      <div class="column">
        <h1>Community Guidelines</h1>
      </div>
    </div>
    <div class="columns about-us-page-text">
      <div class="column is-6 is-offset-3">
        <div class="single">
          <h1><strong>1) I will upload only the work I created.</strong></h1>
          <ul>
            <li>Don't post other's work.</li>
            <li>Do not claim credit for the work of others.</li>
            <li>Don't post copyrighted or trademark content.</li>
          </ul>
        </div>
        <div class="single">
          <h1><strong>2) Don't post inappropriate content</strong></h1>
          <p>We welcome you in our community. please do not post content that contains:</p>
          <ul>
            <li>Pornographic, mature or adult content.</li>
            <li>Racist, sexist, or otherwise offensive.</li>
            <li>Don't post copyrighted or trademark content.</li>
          </ul>
          <p>If you post inappropriate content, Bybu will remove it in accordance with our <a href="{{url('/terms')}}">Terms of Service</a> or we will delete your Bybu account.</p>
          <h2>If these guidelines are not followed, your account will be suspended or revoked.</h2>
        </div>

      </div>
    </div>
  </section>

  @include('_partials.footer');

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
