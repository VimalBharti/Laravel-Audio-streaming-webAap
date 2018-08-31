@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

  <div class="user-dashboard">
    <div class="menu-bar">
      @include('_partials.navbar')
    </div>

    <div class="columns">

      @include('members.sidebar')

      <div class="column is-10">

        <section>
          <div class="columns is-multiline all-post-list">
            @foreach ($posts as $post)
              <div class="column is-one-quarter single-post">
                <div class="card">
                  <div class="card-image">
                    <figure class="image is-4by3">
                      <a href="{{route('post.show', $post->slug)}}" target="_blank">
                        <img src="/uploads/design/thumbs/{{ $post->image }}" class="thumb">
                      </a>

                      <span class="edit-btn">
                          <a href="{{route('members.edit', $post->id)}}">edit</a>
                      </span>
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
                        <a href="#"><p class="title is-5">{{$post->user_name}}</p></a>
                      </div>
                      <div class="delete-post">
                        {!! Form::open(['route' => ['members.destroy', $post->id], 'method' => 'DELETE']) !!}
                          {!! Form::submit('trash', ['class' => 'delete-button']) !!}
                        {!! Form::close() !!}
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

                    </div>

                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </section>

      </div>

    </div>
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
