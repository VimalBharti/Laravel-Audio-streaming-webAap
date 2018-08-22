<footer class="footer main-footer">
  <div class="content has-text-centered">
    <div class="logo">
      <img src="{{asset('images/w-logo.png')}}" alt="bybu.cc" class="foot-logo">
    </div>

    <div class="social-icons-foot">
      <li>
        <a class="navbar-item" href="https://www.facebook.com/bybu.cc" target="_blank">
          <img src="{{asset('images/icons/facebook.png')}}">
        </a>
      </li>
      <li>
        <a class="navbar-item" href="https://twitter.com/Bybu_cc" target="_blank">
          <img src="{{asset('images/icons/twitter.png')}}">
        </a>
      </li>
    </div>
    <div class="a-links-footer is-hidden-mobile">
      <li><a href="{{url('/about')}}">About</a></li>
      <li><a href="{{route('contact')}}">Contact</a></li>
      <li><a href="{{url('/terms')}}">Terms</a></li>
      <li><a href="{{url('/guideline')}}">Guidelines</a></li>
      <li><a href="{{url('/privacy')}}">Privacy</a></li>
      <li><a href="{{route('showcase.dash')}}">Showcase</a></li>
    </div>
    <!-- <div class="footer-text">
      <h1>Free Live, Free Learn, Free Give, Free Get </h1>
    </div> -->
    <p class="foot-p">Handcrafted by me &copy; bybu.cc</p>
  </div>
</footer>
