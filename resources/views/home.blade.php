@extends('layouts.app')

@section('title', 'Bybu')

@section('content')

  <Preloader></Preloader>

  @include('_partials.navbar')

  <div class="home-top column is-12">
    <section class="hero is-medium is-bold has-text-centered is-vertical-center">
      <div class="hero-body">
        <div class="container">
          <img src="images/logo.png" >
          <h1 class="title is-size-4-mobile">
            Discover &amp; Download
          </h1>
          <h2 class="subtitle">
            Free Live . Free Learn . Free Give . Free Get
          </h2>
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
                    <a href="{{route('post.show', $post->uid)}}" target="_blank">
                      <img src="/uploads/design/{{ $post->image }}" class="thumb">
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
                    @if(isset($post->markup))
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
    </section>
  </div>

  @include('pages.join-com')

  @include('_partials.footer')

@stop

@section('scripts')
<script type="text/javascript">


</script>
@stop
