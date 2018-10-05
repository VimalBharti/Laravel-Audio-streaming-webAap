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
            {!! Form::open(array('route' => 'members.store', 'id' => 'post-form', 'enctype' => 'multipart/form-data', 'files' => true)) !!}
              {{ csrf_field() }}

              <!-- Title -->
              <div class="field">
                <label class="label">Title : </label>
                <div class="control">
                  <input class="input is-medium" type="text" placeholder="Enter title" name="title">
                </div>
              </div>
              <!-- Category -->
              <div class="field">
                <label class="label">Select Category</label>
                <div class="control">
                  <div class="select is-medium is-fullwidth">
                    <select name="category">
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <!-- Featured image -->
              <div class="field">
                <label class="label">Upload Featured Image:</label>
                <div class="control with-border">
                  <div class="file has-name">
                    <div class="featured">
                      <input type="file" name="image">
                    </div>
                  </div>
                </div>
              </div>
              <!-- Credit -->
              <label class="label">Give Credit to Designer (optional)</label>
              <div class="field is-grouped">
                <div class="control">
                  <input class="input is-medium" type="text" placeholder="Designer name" name="credit">
                </div>
                <div class="control is-expanded">
                  <input class="input is-medium" type="text" placeholder="Profile URL" name="url">
                </div>
              </div>
              <!-- Framework -->
              <div class="framework-checkbtn field">
                <label class="label with-border">Framework name (if use any) :
                  <input type="checkbox" id="yCheck" onclick="myFramework()">
                </label>
                <h5 class="is-size-7">(eg. Bootstrap, Foundation, Semantic UI, etc..)</h5>
              </div>
              <div id="framework-field">
                <p>( Remove default value and enter framework name )</p>
                <div class="field">
                  <div class="control">
                    <input class="input is-medium" type="text" placeholder="if not than leave empty (optional)" name="framework" value="html">
                  </div>
                </div>
              </div>
              <!-- CSS -->
              <div class="field">
                <label class="label">Paste CSS Style : </label>
                <div class="control">
                  <textarea class="textarea" name="css" placeholder="CSS Style" rows="10"></textarea>
                </div>
              </div>
              <!-- Code -->
              <div class="field">
                <label class="label">Paste Markup : </label>
                <div class="control">
                  <textarea class="textarea" name="coding" placeholder="Markup Code" rows="10"></textarea>
                </div>
              </div>
              <!-- JavaScript -->
              <div class="field">
                <label class="label">JavaScript : </label>
                <div class="control">
                  <textarea class="textarea" name="js" placeholder="JavaScript" rows="10"></textarea>
                </div>
              </div>

              <!-- Keywords / description -->
              <div class="field">
                <label class="label">Keywords / short description : </label>
                <div class="control">
                  <input class="input is-medium" type="text" placeholder="Keywords for healping in search" name="keyword">
                </div>
              </div>

              <!-- Tags -->
              <div class="field">
                <label class="label">Select Tag</label>
                <div class="control">
                  <div class="select is-medium is-fullwidth">
                    <select name="tags[]" class="select2-multi" multiple="multiple">
                      @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <label class="checkbox terms-tick">
                    <input type="checkbox" required>
                    I agree to the <a href="{{url('/terms')}}">terms and conditions</a>
                  </label>
                </div>
              </div>

              <div class="field is-grouped">
                <div class="control">
                  {{ Form::submit('Submit freebie', array('class' => 'submit-freebie')) }}
                </div>
                <div class="control">
                  <button class="button grey-lighter">Cancel</button>
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
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123989535-1"></script>
  {!! Html::script('js/select2.min.js') !!}
  <script type="text/javascript">
    $('.select2-multi').select2();

    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-123989535-1');
  </script>
@endsection
