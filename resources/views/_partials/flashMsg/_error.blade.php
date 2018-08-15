@if ($errors->any())
    <div class="flash-full-screen container" id="errorMessage">
        <div class="error-msg-pop columns is-12">
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif
