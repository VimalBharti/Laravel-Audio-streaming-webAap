@extends('layouts.app')

@section('content')



  <div class=" section">
    <div class="columns admin-panel">

      @include('admins.sidebar')

      <div class="column is-10 has-text-centered">

        <div class="user" style="padding:2em;">
            <h2 class="is-size-2 heading"  style="font-weight:bold;"> Total Post Count</h2>
            <p style="font-size:1.2em;">
              Number of Designs in Bybu
            </p>

            <h1>

              <a style="font-size:15em;border:2px solid #efefef;border-radius:50%;padding:5px 25px;">
                {{$posts}}
              </a>
            </h1>
        </div>

      </div>

    </div>
  </div>


@endsection
