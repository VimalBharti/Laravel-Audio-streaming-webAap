@extends('layouts.app')

@section('content')



  <div class=" section">
    <div class="columns admin-panel">

      @include('admins.sidebar')

      <div class="column is-10">

        <div class="">
            <div class="">
                  <h2 class="is-size-4 heading"  style="margin-bottom:1em;font-weight:bold;">All Categories</h2>
                @include('categories.index')
            </div>
            <div class="">
                <h2 class="is-size-4 heading"  style="margin-bottom:1em;font-weight:bold;">Add new category</h2>

                {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                    {{ Form::label('name', 'Category Name:') }}
                    {{ Form::text('name', null, ['style' => 'font-size:2em;margin-Left:20px;']) }}

                    {{ Form::submit('Create new Category', ['class' => 'button is-primary', 'style' => 'height:45px;width:220px;']) }}
                {!! Form::close() !!}
            </div>
        </div>

      </div>

    </div>
  </div>


@endsection
