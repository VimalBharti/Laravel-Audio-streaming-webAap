<nav class="navbar">
  <div class="container">
      <div class="navbar-brand">
        <a class="navbar-item is-hidden-mobile" href="{{route('home')}}">
          <img src="{{asset('images/logo.png')}}" >
        </a>
        <span class="navbar-burger burger nav-toggle" data-target="navMenu">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </div>

  <!-- Mobile menu Start -->
      <div class="navbar-menu is-hidden-tablet" id="navMenu">
        <div class="navbar-end">
          @if (Auth::guest())
              <a href="{{url('/login')}}" class="navbar-item showcase-btn">
                <span>Login</span>
              </a>
              <a href="{{route('showcase.dash')}}" class="navbar-item showcase-btn">
                <span>Showcase</span>
              </a>
          @else
          <div class="m-navbar-menu">
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

            <hr class="dropdown-divider">
            <li>
              <a href="{{route('me.index')}}" target="_blank">
                  <b-icon icon="fas fa fa-plus-circle"></b-icon>
                  <strong>SHOWCASE</strong>
              </a>
            </li>
            <hr class="dropdown-divider">

            <li value="logout">
              <a href="{{route('user.logout')}}" class="logout-btn">
                <b-icon icon="fas fa fa-sign-out"></b-icon>
                Logout
              </a>
            </li>
          </div>

          @endif
        </div>
      </div>
  <!-- mobile menu ends -->

      <div class="navbar-menu">
        <div class="navbar-end">
          @if (Auth::guest())
            <a class="navbar-item"><b-icon icon="fas fa fa-facebook"></b-icon></a>
            <a class="navbar-item"><b-icon icon="fas fa fa-twitter"></b-icon></a>
            <a href="{{route('showcase.dash')}}" class="navbar-item showcase-btn">
              <span>Showcase</span>
            </a>
            <b-dropdown position="is-bottom-left">
                <a class="navbar-item login-btn" slot="trigger">
                    <span>Login</span>
                    <b-icon icon="fas fa fa-caret-down"></b-icon>
                </a>

                <b-dropdown-item custom paddingless>
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                      {{ csrf_field() }}
                        <div class="modal-card" style="width:300px;">
                            <section class="modal-card-body">
                                <b-field label="Email">
                                    <b-input
                                        name="email"
                                        type="email"
                                        placeholder="Your email"
                                        required>
                                    </b-input>
                                </b-field>

                                <!-- Store previous location -->
                                <div class="form-group">
                                  @if (Request::has('previous'))
                                      <input type="hidden" name="previous" value="{{ Request::get('previous') }}">
                                  @else
                                      <input type="hidden" name="previous" value="{{ URL::previous() }}">
                                  @endif
                                </div>
                                <!-- Store previous location end -->

                                <b-field label="Password">
                                    <b-input
                                        type="password"
                                        name="password"
                                        password-reveal
                                        placeholder="Your password"
                                        required>
                                    </b-input>
                                </b-field>

                            <b-checkbox>Remember me</b-checkbox>
                            </section>
                            <footer class="modal-card-foot">
                                <button class="button">Login</button>
                                <a href="{{url('/register')}}" class="new-acc-link">Create New Account</a>
                            </footer>
                        </div>
                    </form>
                </b-dropdown-item>
            </b-dropdown>
          @else
            <b-dropdown v-model="navigation" position="is-bottom-left">
                <a class="navbar-item" slot="trigger">
                    <span>{{ Auth::user()->name }}</span>
                    <b-icon icon="fas fa fa-caret-down"></b-icon>
                </a>

                <b-dropdown-item has-link>
                    <a href="{{route('members.create')}}">
                        <b-icon icon="fas fa fa-plus-circle"></b-icon>
                        Post Freebie
                    </a>
                </b-dropdown-item>
                <b-dropdown-item has-link>
                    <a href="{{route('member.dashboard')}}">
                        <b-icon icon="fas fa fa-bars"></b-icon>
                        My Freebies
                    </a>
                </b-dropdown-item>
                <b-dropdown-item has-link>
                    <a href="{{route('profiles.show', $user->username)}}">
                        <b-icon icon="fas fa fa-user-circle-o"></b-icon>
                        Profile
                    </a>
                </b-dropdown-item>

                <hr class="dropdown-divider">
                <b-dropdown-item has-link>
                    <a href="{{route('me.index')}}" target="_blank">
                        <b-icon icon="fas fa fa-plus-circle"></b-icon>
                        <strong>SHOWCASE</strong>
                    </a>
                </b-dropdown-item>
                <hr class="dropdown-divider">

                <b-dropdown-item value="logout">
                  <a href="{{route('user.logout')}}" class="logout-btn">
                    <b-icon icon="fas fa fa-sign-out"></b-icon>
                    Logout
                  </a>
                </b-dropdown-item>
            </b-dropdown>
          @endif
        </div>
        <!-- navbar-end -->
      </div>
      <!-- navbar-menu -->
    </div>
  </nav>
