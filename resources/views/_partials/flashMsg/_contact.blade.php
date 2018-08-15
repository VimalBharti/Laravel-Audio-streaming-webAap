@if (Session::has('success'))
    <div class="flash-full-screen container" id="postMessage">
        <div class="contact-msg-pop column is-8 is-offset-2">
          <div class="column is-6 is-offset-3 has-text-centered">
            <h3>Your request has been sent</h3>
            <p>Thanks for contacting us!</p>
          </div>
        </div>
    </div>
@endif
