@extends('layouts.app')

@section('title', 'Profile')

@section('content')

  <div class="plain-footer-container public-profile-page">
    <div class="menu-bar">
      @include('_partials.navbar')
    </div>

    <section class="with-plain-footer">
      <div class="container is-fluid">
        <div class="columns top-pad">
          <div class="column is-4 left-sidebar">
            <div class="left-sidebar-top">
              <img src="/avatar/{{$user->avatar}}">
              <h1>{{$user->name}}</h1>
              <h2>
                {{$user->city}}
                @if(isset ($user->country_id))
                  {{$user->country->name}}
                @endif
              </h2>

              <div class="column social-icons-links">
                <ul>
                  @if(isset ($user->behance))
                      <li><a href="{{$user->behance}}" target="_blank">
                        <i class="fa fa-behance"></i>
                      </a></li>
                  @endif
                  @if(isset ($user->twitter))
                      <li><a href="{{$user->twitter}}" target="_blank">
                        <i class="fa fa-twitter"></i>
                      </a></li>
                  @endif
                  @if(isset ($user->dribbble))
                      <li><a href="{{$user->dribbble}}" target="_blank">
                        <i class="fa fa-dribbble"></i>
                      </a></li>
                  @endif
                </ul>
              </div>

              <div class="edit-btn">
                <a href="{{route('profiles.edit', $user->username)}}" class="button">Edit profile</a>
              </div>
            </div>
            <!-- left sidebar top ends -->
            <div class="left-sidebar-bottom">
              <ul>
                <li>
                  <span><i class="fa fa-map-marker fa-lg"></i> From:</span>
                  <strong class="is-pulled-right">{{$user->city}}</strong>
                </li>
                <li>
                  <span><i class="fa fa-globe"></i> Country:</span>
                  <strong class="is-pulled-right">
                    @if(isset ($user->country_id))
                      {{$user->country->name}}
                    @else
                      <p>Not mentioned</p>
                    @endif
                  </strong>
                </li>
                <li>
                  <span><i class="fa fa-database"></i> Total Post:</span>
                  <strong class="is-pulled-right">{{$post}}</strong>
                </li>
                <li>
                  <span><i class="fa fa-heart"></i> Followers:</span>
                  <strong class="is-pulled-right">{{$follower}}</strong>
                </li>
              </ul>
            </div>

          </div>
          <!-- end is-4 -->

          <div class="column is-8 center-bar">

              <section>
                <div class="columns is-multiline all-post-list">
                  @foreach ($posts as $post)
                    <div class="column is-4 single-post">
                      <div class="card">
                        <div class="card-image">
                          <figure class="image is-4by3">
                            <a href="{{route('post.show', $post->slug)}}" target="_blank">
                              <img src="/uploads/design/thumbs/{{ $post->image }}">
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
                            <div class="delete-btn">

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
        <!-- columns end -->
      </div>
    </section>
    <!-- container ends -->

  </div>

<Myplainfooter></Myplainfooter>

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
