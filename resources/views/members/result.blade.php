@extends('layouts.app')

@section('title', 'Free')

@section('content')

<div class="plain-footer-container">

  <div class="menu-bar">
    @include('_partials.navbar')
  </div>

  <section id="infinite-scroll">
    <div class="container is-fluid">
      <div class="columns is-multiline home-post-list">
        @if (isset($data))
          @foreach ($data as $post)
            <div class="column is-3 single-post">
              <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <a href="{{route('post.show', $post->slug)}}" target="_blank">
                      <img src="/uploads/design/thumbs/{{ $post->image }}" class="thumb">
                    </a>
                  </figure>
                </div>
                <div class="card-content">
                  <div class="media">
                    <div class="user-small-image">
                      <figure class="image is-24x24 user-image">
                        <img src="/avatar/{{$post->user_image}}" class="is-rounded">
                      </figure>
                    </div>
                    <div class="media-content">
                      <a href="/profile/{{$post->user_slug}}" target="_blank">
                        <p class="title is-5">{{$post->user_name}}</p>
                      </a>
                    </div>
                  </div>

                  <div class="content">
                    @if(isset($post->psd))
                      <a class="button is-primary is-outlined">PSD</a>
                    @else
                      <a class="button is-static">PSD</a>
                    @endif

                    @if(isset($post->coding))
                      <a class="button is-primary is-outlined">{{$post->framework}}</a>
                    @else
                      <a class="button is-static">HTML</a>
                    @endif

                    @if(isset($post->css))
                      <a class="button is-primary is-outlined">CSS</a>
                    @else
                      <a class="button is-static">CSS</a>
                    @endif

                    <!-- <span class="icon total_likes is-pulled-right">
                      22 <i class="fa fa-heart"></i>
                    </span> -->
                  </div>

                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </section>

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
