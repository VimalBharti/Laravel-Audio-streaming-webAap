@extends('layouts.app')

@section('title', 'Free showcase')

@section('content')

  <div class="plain-footer-container showcase-page">
    <div class="menu-bar">
      @include('_partials.navbar')
    </div>

    <div class="with-plain-footer">

      <nav class="left-navbar is-hidden-mobile">
        <div class="left-navbar-inner">
          <ul>
            <li class="main-logo">
              <a href="{{route('showcase.dash')}}"><img src="{{asset('images/slogo.png')}}"></a>
            </li>
            <li>
              <a href="{{route('profiles.show', $user->username)}}"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="{{url('/')}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </li>
          </ul>
          <!-- profile -->
          <ul class="profile">
            <li>
              <a class="profile-trigger">
                <img src="/avatar/{{$user->avatar}}" class="nav-avatar">
                <span class="online"></span>
              </a>
            </li>
          </ul>

        </div>
      </nav>

      <div class="column is-12 showcase-area">
        @if(count($showcases) == 1)
            @foreach($showcases as $showcase)
                <div class="featured-image-box column is-5">
                    <a href="{{route('showcase.single', $showcase->slug)}}" target="_blank"><img src="/myshowcase/{{$showcase->image}}"></a>

                    <!-- delete image -->
                    <div class="delete-button-box">
                        {!! Form::open(['route' => ['me.destroy', $showcase->id], 'method' => 'DELETE' ]) !!}
                            {!! Form::submit('Delete', ['class' => 'delete-button']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            @endforeach
        @else
            {!! Form::open(array('route' => 'me.store', 'data-parsley-validate' => '', 'enctype' => 'multipart/form-data', 'files' => true)) !!}

                <div class="add-showcase">
                    <div class="">
                        <input type="file" name="image" class="form-control" id="files" style="display:none;" onchange='this.form.submit();'>
                    </div>
                    <div class="add-new-icon">
                        <ul class="inline-block">
                            <li class="upload-icon">
                                <label for="files" class="btn upload">
                                    <img src="{{asset('images/plus.png')}}">
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>

            {!! Form::close() !!}
        @endif

      </div>

    </div>
    <!-- container ends -->

  </div>

  @include('_partials.plainfooter')

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
