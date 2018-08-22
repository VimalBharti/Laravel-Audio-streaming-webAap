@extends('layouts.app')

@section('content')



  <div class=" section">
    <div class="columns admin-panel">

      @include('admins.sidebar')

      <div class="column is-5">
        <div class="categories-box">
          <h2 class="is-size-4 heading"  style="margin-bottom:1em;font-weight:bold;">All Categories</h2>
          @include('categories.index')
        </div>
      </div>
      <div class="column is-5">
        <div class="categories-box">
          <h2 class="is-size-4 heading"  style="margin-bottom:1em;font-weight:bold;">All Categories</h2>
          @include('tags.index')
        </div>
      </div>


    </div>
  </div>


@endsection
