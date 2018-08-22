
    <div class="user" style="padding:2em;">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Destroy</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('delete', ['class' => 'delete-button']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="">
            <h2 class="is-size-4 heading"  style="margin-bottom:1em;font-weight:bold;">Add new category</h2>

            {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                {{ Form::label('name', 'Category Name:') }} <br>
                {{ Form::text('name', null, ['style' => 'font-size:1.6em;']) }}

                {{ Form::submit('Add Category', ['class' => 'button is-primary', 'style' => 'height:37px;width:150px;']) }}
            {!! Form::close() !!}
        </div>
    </div>
