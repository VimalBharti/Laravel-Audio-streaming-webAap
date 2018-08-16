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
          <b-tabs position="is-centered" v-model="activeTab">

              <b-tab-item label="All">
                <div class="columns is-multiline all-post-list">
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
              </b-tab-item>

              <b-tab-item label="Header">
                <div class="columns is-multiline all-post-list">
                  @foreach ($headers as $post)
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
                              <a href="#"><p class="title is-5">{{$post->user_name}}</p></a>
                            </div>
                          </div>

                          <div class="content">
                            @if(isset($post->psd))
                              <a class="button is-primary is-outlined">PSD</a>
                            @else
                              <a class="button is-static">PSD</a>
                            @endif
                            @if(isset($post->code))
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
              </b-tab-item>

              <b-tab-item label="Footer">
                <div class="columns is-multiline all-post-list">
                  @foreach ($footers as $post)
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
                              <a href="#"><p class="title is-5">{{$post->user_name}}</p></a>
                            </div>
                          </div>

                          <div class="content">
                            @if(isset($post->psd))
                              <a class="button is-primary is-outlined">PSD</a>
                            @else
                              <a class="button is-static">PSD</a>
                            @endif
                            @if(isset($post->code))
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
              </b-tab-item>

              <b-tab-item label="Templates">
                <div class="columns is-multiline all-post-list">
                  @foreach ($templates as $post)
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
                              <a href="#"><p class="title is-5">{{$post->user_name}}</p></a>
                            </div>
                          </div>

                          <div class="content">
                            @if(isset($post->psd))
                              <a class="button is-primary is-outlined">PSD</a>
                            @else
                              <a class="button is-static">PSD</a>
                            @endif
                            @if(isset($post->code))
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
              </b-tab-item>

          </b-tabs>
        </section>

      </div>

    </div>
  </div>

@endsection
