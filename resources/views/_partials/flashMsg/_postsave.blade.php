@if (Session::has('successPost'))
    <div class="flash-full-screen container" id="postMessage">
        <div class="post-msg-pop column is-8 is-offset-2">
          <img src="{{asset('images/tick.png')}}">
        </div>
    </div>
@endif
