@extends('layouts.app')

@section('title', 'Privay Policy')

@section('content')

  <div class="menu-bar">
    @include('_partials.navbar')
  </div>

  <section>
    <div class="columns about-us-page">
      <div class="column">
        <h1>Privacy Policy</h1>
      </div>
    </div>
    <div class="columns about-us-page-text">
      <div class="column is-6 is-offset-3">
        <h1>What personal data do we collect, why do we collect it, with whom do we share it and how do we use it?</h1>
        <ul>
          <li>We collect and process only the personal data necessary for the Bybu.cc service: create a user profile and allow you to access the functions of the website (email address, username).</li>
          <li>We process your personal data to allow you to access the Bybu.cc service.</li>
          <li>Occasionally we may communicate with you regarding our products, services, news and events or any updates.</li>
          <li>We keep your personal information whenever you use Bybu.cc or until you delete your account. After the completion of the Service, the data is retained for a few days.</li>
          <li>We do not share your data with third parties.</li>
        </ul>
        <h2>How to access, update and remove your data from Bybu.cc?</h2>
        <ul>
          <li>
            You can edit your personal data at any:
            <strong><h5>By Edit your profile</h5> </strong>
          </li>
          <li>
            <!-- You can remove your account and personal data at any time here: -->
          </li>
        </ul>

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
