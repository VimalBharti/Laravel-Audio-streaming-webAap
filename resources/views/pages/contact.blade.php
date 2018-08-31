@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

  <div class="menu-bar">
    @include('_partials.navbar')
  </div>

  <section class="is-white has-text-centered contact-page-top">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-three-quarters">
          <h1 class="title is-spaced is-size-1-desktop is-size-2-tablet is-size-4-mobile">
            I’m excited to work with you. <br>Ready to get started?
          </h1>
        </div>
      </div>
    </div>
  </section>

  <section class="is-white contact-page">
    <div class="container">
      <form action="{{ url('/contact-us') }}" method="POST">
        {{ csrf_field() }}
        <div class="columns is-centered">
          <div class="column is-half">
            <div class="field">
              <label class="label">Name</label>
              <div class="inputs is-exanded">
                <input type="text" name="name" class="input is-large" required="">
              </div>
            </div>
          </div>
          <div class="column is-half">
            <div class="field">
              <label class="label">Email</label>
              <div class="inputs is-exanded">
                <input type="email" name="email" class="input is-large" required="">
              </div>
            </div>
          </div>
        </div>
        <div class="columns is-centered">
          <div class="column">
            <div class="field">
              <label class="label">Any Message/Suggestion</label>
              <div class="inputs is-expanded">
                <textarea name="message" rows="5" class="textarea is-large" required></textarea>
              </div>
            </div>
          </div>
        </div>

        <!-- ==================Flash Messages===================-->
            <div>@include('_partials.flashMsg._error')</div>
            <div>@include('_partials.flashMsg._contact')</div>
        <!-- ==================Flash Messages===================-->

        <div class="columns is-centered">
          <div class="coumn is-one-third">
            <div class="fields">
              <div class="inputs">
                <input type="submit" class="button is-medium is-fullwidth is-rounded"></imput>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>

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
