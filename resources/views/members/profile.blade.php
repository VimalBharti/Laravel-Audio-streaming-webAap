@extends('layouts.app')

@section('content')

  <div class="plain-footer-container public-profile-page">
    <div class="menu-bar">
      @include('_partials.navbar')
    </div>

    <div class="container is-widescreen with-plain-footer">

      <div class="columns top-pad">

        <div class="column is-4 left-sidebar">

          <div class="left-sidebar-top">
            <img src="/avatar/{{$user->avatar}}">
            <h1>{{$user->name}}</h1>
            <h2>{{$user->city}}, {{$user->country->name}}</h2>

            <div class="column">
              <ul>
                @if(isset ($user->behance))
                    <li><a href="{{$user->behance}}" target="_blank"><img src="{{asset('images/icons/behance.png')}}"></a></li>
                @endif
                @if(isset ($user->twitter))
                    <li><a href="{{$user->twitter}}" target="_blank"><img src="{{asset('images/icons/twitter.png')}}"></a></li>
                @endif
                @if(isset ($user->dribbble))
                    <li><a href="{{$user->dribbble}}" target="_blank"><img src="{{asset('images/icons/dribble.png')}}"></a></li>
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
                <strong class="is-pulled-right">{{$user->country->name}}</strong>
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
              <b-tabs position="is-centered" v-model="activeTab">

                  <b-tab-item label="All">
                    <div class="columns is-multiline all-post-list">
                      @foreach ($posts as $post)
                        <div class="column is-4 single-post">
                          <div class="card">
                            <div class="card-image">
                              <figure class="image is-4by3">
                                <a href="{{route('post.show', $post->uid)}}" target="_blank">
                                  <img src="/uploads/design/{{ $post->image }}">
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
                        <div class="column is-4 single-post">
                          <div class="card">
                            <div class="card-image">
                              <figure class="image is-4by3">
                                <a href="{{route('post.show', $post->uid)}}" target="_blank">
                                  <img src="/uploads/design/{{ $post->image }}">
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

                                <span class="icon has-text-info is-pulled-right">
                                  <i class="fa fa-heart-o"></i>
                                </span>
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
                        <div class="column is-4 single-post">
                          <div class="card">
                            <div class="card-image">
                              <figure class="image is-4by3">
                                <a href="{{route('post.show', $post->uid)}}" target="_blank">
                                  <img src="/uploads/design/{{ $post->image }}">
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

                                <span class="icon has-text-info is-pulled-right">
                                  <i class="fa fa-heart-o"></i>
                                </span>
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
                        <div class="column is-4 single-post">
                          <div class="card">
                            <div class="card-image">
                              <figure class="image is-4by3">
                                <a href="{{route('post.show', $post->uid)}}" target="_blank">
                                  <img src="/uploads/design/{{ $post->image }}">
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

                                <span class="icon has-text-info is-pulled-right">
                                  <i class="fa fa-heart-o"></i>
                                </span>
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
      <!-- columns end -->

    </div>
    <!-- container ends -->

  </div>

<Myplainfooter></Myplainfooter>

@endsection
