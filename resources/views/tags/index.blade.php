
    <div class="user" style="padding:2em;">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Tag ID</th>
                    <th>Tag Name</th>
                    <th>Destroy</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>
                        {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('delete', ['class' => 'delete-button']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="">
            <h2 class="is-size-4 heading"  style="margin-bottom:1em;font-weight:bold;">Add new Tag</h2>

            {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
                {{ Form::label('name', 'Tag Name:') }} <br>
                {{ Form::text('name', null, ['style' => 'font-size:1.8em;']) }}

                {{ Form::submit('Add Tag', ['class' => 'button is-primary', 'style' => 'height:40px;width:120px;']) }}
            {!! Form::close() !!}
        </div>

    </div>
