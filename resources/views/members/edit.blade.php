@extends('layouts.app')

@section('title', 'Post new freebie')

@section('stylesheet')
  {!! Html::style('css/select2.min.css') !!}
@stop

@section('content')

  <div class="user-dashboard">
    <div class="menu-bar">
      @include('_partials.navbar')
    </div>

    <!-- ==================Flash Messages===================-->
        <div>@include('_partials.flashMsg._error')</div>
        <div>@include('_partials.flashMsg._postsave')</div>
    <!-- ==================Flash Messages===================-->

    <div class="columns">

        @include('members.sidebar')

        <div class="column is-7 create-new-post">

            {!! Form::model($post, ['route' => ['members.update', $post->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'files' => true]) !!}

              {{ csrf_field() }}

              <!-- Title -->
              <div class="field">
                <div class="control">
                  <h1 style="font-size:1.8em;background:#f7f7f7;padding:5px 12px;text-align:center">{{$post->title}}</h1>
                </div>
              </div>

              <!-- Credit -->
              <label class="label">Give Credit to Designer (optional)</label>
              <div class="field is-grouped">
                <div class="control">
                  {{ Form::text('credit', null, ["class" => 'input is-medium']) }}
                </div>
                <div class="control is-expanded">
                  {{ Form::text('url', null, ["class" => 'input is-medium']) }}
                </div>
              </div>

              <!-- Framework -->
              <div class="framework-checkbtn field">
                <label for="">Framework Name</label>
                {{ Form::text('framework', null, ["class" => 'input is-medium']) }}
                <h5 class="is-size-7">(eg. Bootstrap, Foundation, Semantic UI, etc..)</h5>
              </div>
              <!-- CSS -->
              <div class="field">
                <label class="label">Paste CSS Style : </label>
                <div class="control">
                  {{ Form::textarea('css', null, ["class" => 'textarea']) }}
                </div>
              </div>
              <!-- Code -->
              <div class="field">
                <label class="label">Paste Markup : </label>
                <div class="control">
                  {{ Form::textarea('coding', null, ["class" => 'textarea']) }}
                </div>
              </div>
              <!-- JavaScript -->
              <div class="field">
                <label class="label">JavaScript : </label>
                <div class="control">
                  {{ Form::textarea('js', null, ["class" => 'textarea']) }}
                </div>
              </div>

              <!-- Keywords / description -->
              <div class="field">
                <label class="label">Keywords / short description : </label>
                <div class="control">
                  {{ Form::text('keyword', null, ["class" => 'input is-medium']) }}
                </div>
              </div>

              <div class="field is-grouped">
                <div class="control">
                  {{ Form::submit('Save Changes', array('class' => 'submit-freebie')) }}
                </div>
                <div class="control">
                  <a href="{{route('member.dashboard')}}" class="button grey-lighter">Cancel</a>
                </div>
              </div>

            {!! Form::close() !!}
        </div>

        <div class="column is-3 right-sidebar-about">
          <div class="content">
            <h4>Featured Image</h4>
            <ul>
              <li>Maximum Image Size: 2MB</li>
              <li>Image Extension: JPEG | PNG</li>
            </ul>

            <h4>Credit</h4>
            <ul>
              <li>Mention designer name if you use his/her design.</li>
              <li>with his/her social account url; (behance, dribbble, etc)</li>
            </ul>

            <h4>Framework</h4>
            <p>- Select checkbox if your code is build with any Framework</p>
            <p>- Remove default value (HTML) and enter your framework name.</p>
          </div>
        </div>


    </div>
  </div>


@endsection

@section('scripts')
  {!! Html::script('js/select2.min.js') !!}
  <script type="text/javascript">
    $('.select2-multi').select2();
  </script>
@endsection
