@extends('layouts.app')

@section('title', $single->slug)

@section('content')

  <div class="menu-bar">
    @include('_partials.navbar')
  </div>

  <div class="single-design-page">

    <div class="container">
      <div class="featured-image-single has-text-centered">
        <img src="/uploads/design/{{ $single->image }}" class="is-fullheight is-fullwidth">

        <div class="single-post-customize-btn is-hidden-mobile">
          <a href="{{route('preview-design', $single->slug)}}">
            <i class="fa fa-eye" aria-hidden="true"></i>Preview
          </a>
        </div>

      </div>

      <section>
        <b-tabs type="is-boxed" position="is-centered" size="is-medium" expanded>
            <b-tab-item label="CODE" icon="fas fa fa-code">
<pre>
<code class="language-html" data-lang="html">
{{ $single->coding }}
</code>
</pre>
            </b-tab-item>

            <b-tab-item label="CSS" icon="fas fa fa-css3">
<pre>
<code class="language-html" data-lang="css">
{{$single->css}}
</code>
</pre>
            </b-tab-item>

            <b-tab-item label="JS" icon="fas fa fa-css3">
<pre>
<code class="language-html" data-lang="js">
{{$single->js}}
</code>
</pre>
            </b-tab-item>

        </b-tabs>
      </section>

      <div class="content posted-by-single-page">
        <div class="columns">
          <div class="column is-half">
            <p><i class="fa fa-edit"></i> Submitted By:
              <strong><a href="/profile/{{$single->user_slug}}">{{$single->user_name}}</a></strong>
            </p>
          </div>
          <div class="column is-half has-text-right">
            @if(isset($single->credit))
            <p><i class="fa fa-edit"></i> Credit:
              <strong><a href="{{$single->url}}" target="_blank">{{$single->credit}}</a></strong>
            </p>
            @endif
          </div>
        </div>
      </div>

      <div class="tags">
        @foreach($single->tags as $tag)
          <span class="tag is-dark">
            {{ $tag->name }}
          </span>
        @endforeach
      </div>

    </div>
    <!-- container ends -->

  </div>

    @include('pages.join-com')

    @include('_partials.footer')

  @stop

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
