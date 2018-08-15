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

        

      </div>
      <!-- columns end -->

    </div>
    <!-- container ends -->

  </div>

<Myplainfooter></Myplainfooter>

@endsection
