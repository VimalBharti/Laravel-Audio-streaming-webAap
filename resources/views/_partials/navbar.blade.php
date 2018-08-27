<nav class="navbar">
  <div class="container">
      <div class="navbar-brand">
        <a class="navbar-item" href="{{route('home')}}">
          <img src="{{asset('images/logo.png')}}" alt="bybu.cc">
        </a>
        <a class="navbar-burger burger nav-toggle" onclick="openSlideMenu()">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>

      <div class="navbar-menu" id="navMenu">
        <div class="navbar-end">
          @if (Auth::guest())

            <a href="{{route('showcase.dash')}}" class="navbar-item showcase-btn">
              <span>Showcase</span>
            </a>
            <a class="navbar-item login-btn" href="{{url('/login')}}">
                <span>Login</span>
            </a>
          @else
            <a href="{{route('showcase.dash')}}" class="navbar-item">
                <strong>Showcase</strong>
            </a>
            <a class="navbar-item auth-name" id="auth-name">
                <span>{{ Auth::user()->name }}</span>
                <b-icon icon="fas fa fa-caret-down"></b-icon>
            </a>

            <div class="dropdown-menu-auth" id="dropdown-menu-auth">
              <ul class="">
                <li>
                    <a href="{{route('members.create')}}">
                        <b-icon icon="fas fa fa-plus-circle"></b-icon>
                        Post Freebie
                    </a>
                </li>
                <li>
                    <a href="{{route('member.dashboard')}}">
                        <b-icon icon="fas fa fa-bars"></b-icon>
                        My Freebies
                    </a>
                </li>
                <li>
                    <a href="{{route('profiles.show', $user->username)}}">
                        <b-icon icon="fas fa fa-user-circle-o"></b-icon>
                        Profile
                    </a>
                </li>

                <li>
                  <a href="{{route('user.logout')}}" class="logout-btn">
                    <b-icon icon="fas fa fa-sign-out"></b-icon>
                    Logout
                  </a>
                </li>

              </ul>
            </div>

          @endif
        </div>
        <!-- navbar-end -->
      </div>
      <!-- navbar-menu -->

      <!-- mobile navbar  -->
      <div id="side-menu" class="side-nav">
        <a class="navbar-burger burger nav-toggle" onclick="closeSlideMenu()">
          <span></span>
          <span></span>
          <span></span>
        </a>

        @if (Auth::guest())
          <li class="res-log-btn"><a class="navbar-item login-btn" href="{{url('/login')}}">
            <i class="fa fa-sign-in"></i> Login
          </a></li>
          <li class="res-log-btn"><a class="navbar-item login-btn" href="{{url('/register')}}">
            <i class="fa fa-sign-in"></i> Register
          </a></li>

        @else
          <li class="auth-details">
              <img src="/avatar/{{ Auth::user()->avatar }}" class="user-pic-thumb">
              <h3>{{ Auth::user()->name }}</h3>
          </li>
          <li><a href="{{route('members.create')}}"><i class="fa fa-plus-circle"></i>Post Freebie</a></li>
          <li><a href="{{route('showcase.dash')}}"><i class="fa fa-plus-circle"></i>Showcase</a></li>
          <li><a href="{{route('member.dashboard')}}"><i class="fa fa-bars"></i>My Freebies</a></li>
          <li><a href="{{route('profiles.show', $user->username)}}"><i class="fa fa-user-circle-o"></i>Profile</a></li>
          <li><a href="{{route('user.logout')}}"><i class="fa fa-sign-out"></i>Logout</a></li>
        @endif
      </div>
      <!-- mobile navbar ends  -->

    </div>
  </nav>
