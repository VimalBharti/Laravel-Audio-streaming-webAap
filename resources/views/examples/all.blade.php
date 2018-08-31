@extends('layouts.app')

@section('content')
<style media="screen">
  .ajax-load{
    background: #e1e1e1;padding: 10px 0px;width: 100%;
  }
</style>

  <div class="menu-bar">
    @include('_partials.navbar')
  </div>

  <div class="container">

    <section>
      <div class="columns is-multiline home-post-list">
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

                </div>

              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="paginate" role="navigation" aria-label="pagination">
          {!! $posts->links(); !!}
      </div>
  </section>

</div>

<Myfooter></Myfooter>

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
