@extends('layouts.app')

@section('title', 'About Us')

@section('content')

  <div class="menu-bar">
    @include('_partials.navbar')
  </div>

  <section>
    <div class="columns about-us-page">
      <div class="column">
        <h1>About Bybu</h1>
      </div>
    </div>
    <div class="columns about-us-page-text">
      <div class="column is-6 is-offset-3">
        <h2>Bybu is a place where you can give, get, promote, and explore design with code and free PSD.</h2>
        <p>Bybu is a community of designers / developers. Web designers, graphic designers, doodlers, illustrators, icon artists, typographers, logo designers and other creative people publish their work and allow it to be downloaded or used for any purpose.</p>
        <p>Founded in 2018, Bybu has grown into an adorable and inspiring destination for many people. Bybu has the mission to build the best and free platform in the world for designers, professionals and non-professionals to get inspiration, comments, community and help others for free.</p>
        <p>Bybu is an easy-to-use tool for web designers and freelancers. Bybu - Showcase is free. With the help of our system you can present your design in a browser. Everything is very easy, simply upload your design and send the unique generated url to the client.</p>

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
