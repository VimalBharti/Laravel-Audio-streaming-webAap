@extends('layouts.app')

@section('content')



  <div class=" section">
    <div class="columns admin-panel">

      @include('admins.sidebar')

      <div class="column is-10">

        <div class="user" style="padding:2em;max-height:80%;overflow-y:scroll">
            <h2 class="is-size-4 heading"  style="margin-bottom:1em;font-weight:bold;">Total Members of Bybu</h2>

            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Total Freebies Submit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td data-title="Increment">{{ $no++ }}</td>
                        <td data-title="ID">{{$user->id}}</td>
                        <td data-title="Name">{{$user->name}}</td>
                        <td data-title="Total"></td>
                        <td data-title="Total">
                          {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Delete Account', ['class' => 'delete-button']) !!}
                          {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

      </div>

    </div>
  </div>


@endsection
