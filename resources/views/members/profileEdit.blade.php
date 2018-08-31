@extends('layouts.app')

@section('content')

<div class="plain-footer-container edit-profile-page">
    <div class="menu-bar">
      @include('_partials.navbar')
    </div>

    <div class="container is-widescreen with-plain-footer">

      <div class="column is-10 is-offset-1">

        <div class="columns top-pad">

          <div class="column is-4 left-sidebar">

            <div class="left-sidebar-top">
              <img src="/avatar/{{$user->avatar}}" class="dp">
              <h1>{{$user->name}}</h1>

              <form enctype="multipart/form-data" action="{{ route('avatar.update') }}" method="POST" enctype="multipart/form-data">
                  <input type="file" name="avatar" id="files" style="display:none;" onchange='this.form.submit();'>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <label for="files" class="save-btn box-shadow">
                    <img src="{{asset('images/camera.png')}}" id="upload-icon">
                  </label>
              </form>
            </div>

            <div class="left-sidebar-bottom">
              <h1>@</h1>
              <h3>bybu.cc/{{$user->username}}</h3>
              <p>your bybu bucket</p>
            </div>

          </div>

          <div class="column is-8 edit-fields">
            {!! Form::model($user, ['route' => ['profiles.update', $user->username], 'method' => 'PUT']) !!}

            <div class="field">
              <label class="label">City Name : </label>
              <div class="control">
                {{ Form::text('city', null, array('class' => 'input is-medium')) }}
              </div>
            </div>

            <div class="field">
              <label class="label">Select Country</label>
              <div class="control">
                <div class="select is-medium is-fullwidth">
                  <select name="country" class="country">
                    @foreach($country as $desh)
                      <option value="{{$desh->id}}">{{$desh->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="field">
              <label class="label">Behance URL : </label>
              <div class="control">
                <input class="input is-medium" type="text" placeholder="if not than leave empty (optional)" name="behance">
              </div>
            </div>
            <div class="field">
              <label class="label">Twitter URL : </label>
              <div class="control">
                <input class="input is-medium" type="text" placeholder="if not than leave empty (optional)" name="twitter">
              </div>
            </div>
            <div class="field">
              <label class="label">Dribbble URL : </label>
              <div class="control">
                <input class="input is-medium" type="text" placeholder="if not than leave empty (optional)" name="dribbble">
              </div>
            </div>

            <div class="field is-grouped">
              <div class="control">
                {{ Form::submit('Update', array('class' => 'update-profile')) }}
              </div>
              <div class="control">
                <a href="{{route('profiles.show', $user->username)}}" class="button cancel-btn">
                  Cancel
                </a>
              </div>
            </div>


            {!! Form::close() !!}
          </div>

        </div>

      </div>

    </div>
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
