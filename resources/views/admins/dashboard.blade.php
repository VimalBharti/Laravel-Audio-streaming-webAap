

<div class="plain-footer-container showcase-page">

  <div class="with-plain-footer section">

    <nav class="left-navbar">
      <div class="left-navbar-inner">
        <ul>
          <li>
            <a href="{{route('admin.logout')}}">Logout</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="columns">
        <div class="column is-6">
            <h2>Categories</h2>
            @include('categories.index')
        </div>
        <div class="column is-6">
            <h2>Add new category</h2>
            {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                {{ Form::label('name', 'Category Name:') }}
                {{ Form::text('name', null, ['class' => '']) }}

                {{ Form::submit('Create new Category', ['class' => 'button btn-dark-blue mt2']) }}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="columns">
        <h2>Total Users</h2>
        <table class="table-bordered" id="table-responsive">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Total Freebies Submit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td data-title="ID">{{$user->id}}</td>
                    <td data-title="Name">{{$user->name}}</td>
                    <td data-title="Total"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

  </div>
</div>
