@extends('layouts.app')

@section('title', 'Bybu')

@section('content')

  <!-- <Preloader></Preloader> -->

  @include('_partials.navbar')

  <div class="home-top column is-12">
    <section class="hero is-bold has-text-centered is-vertical-center">
      <div class="hero-body">
        <div class="container">
          <h1 class="title is-size-4-mobile">
            Discover &amp; Download
          </h1>
          <img src="{{asset('images/t-logo.png')}}" alt="">
        </div>
        <div class="container">
          <div class="search-bar-hero column is-6 is-offset-3">
            <form action="result" method="post" role="search">
              {{ csrf_field() }}
              <div class="field has-addons">
                <div class="control is-expanded">
                  <input class="input is-medium" type="text" placeholder="Search...." name="search">
                </div>
                <div class="control">
                  <button class="button is-medium">
                    Search
                  </button>
                </div>
              </div>
            </form>
            <h2 class="subtitle">
              Free Live . Free Learn . Free Give . Free Get
            </h2>
            <div class="error-box has-text-centered" id="no-result">
              @if (session('error'))
                  <p>{{ session('error') }}</p>
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="container is-fluid">
    <section id="infinite-scroll">
      <div class="columns is-multiline home-post-list">
        @if (count($posts) > 0)
          @foreach ($posts as $post)
            <div class="column is-one-quarter single-post">
              <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <a href="{{route('post.show', $post->slug)}}" target="_blank">
                      <img src="/uploads/design/thumbs/{{ $post->image }}" class="thumb">
                    </a>
                  </figure>
                </div>
                <div class="card-content">
                  <div class="title-area">
                    <a href="{{route('post.show', $post->slug)}}" target="_blank">{{ $post->title }}</a>
                  </div>

                  <div class="content">
                    @if(isset($post->psd))
                      <a class="button is-primary is-outlined">PSD</a>
                    @endif

                    @if(isset($post->coding))
                      <a class="button is-primary is-outlined">{{$post->framework}}</a>
                    @endif

                    @if(isset($post->css))
                      <a class="button is-primary is-outlined">CSS</a>
                    @endif

                    <!-- <span class="icon total_likes is-pulled-right">
                      <a href="#"><i class="fa fa-heart"></i>
                    </span> -->
                    <div class="media is-pulled-right">
                      <div class="user-small-image">
                        <figure class="image is-24x24 user-image">
                          <a href="/profile/{{$post->user_slug}}" target="_blank">
                            <img src="/avatar/{{$post->user_image}}" class="is-rounded">
                          </a>
                        </figure>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </section>
  </div>

  @include('pages.join-com')

  @include('_partials.footer')

@stop

@section('scripts')
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123989535-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-123989535-1');
</script>

<script type="text/javascript">
  $("#no-result").delay(2500).fadeOut(300);
</script>
@stop
