@extends('layouts.app')

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
              <!-- PSD -->
              <div class="field">
                <label class="label">Upload PSD if available:</label>
                <div class="control with-border">
                  <div class="file has-name">
                    <div class="featured">
                        <input type="file" name="psd">
                    </div>
                  </div>
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
                  <textarea class="textarea" name="markup" placeholder="Markup Code" rows="10"></textarea>
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <label class="checkbox terms-tick">
                    <input type="checkbox" required>
                    I agree to the <a href="#">terms and conditions</a>
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

            <h4>PSD</h4>
            <ul>
              <li>Upload only PSD File</li>
              <li>Max PSD size: 6MB</li>
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
  <!-- {!! Html::script('js/validate.js') !!} -->
@endsection
