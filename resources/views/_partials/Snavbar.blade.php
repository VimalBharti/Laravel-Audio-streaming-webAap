<nav class="navbar">
  <div class="container">
      <div class="navbar-brand">
        <a class="navbar-item" href="{{route('home')}}">
          <img src="{{asset('images/s-logo.png')}}" alt="bybu.cc">
        </a>
          <span class="navbar-burger burger" data-target="navMenu">
            <span></span>
            <span></span>
            <span></span>
          </span>
      </div>
      <div class="navbar-menu">
        <div class="navbar-end">
          @if (Auth::guest())
            <a class="navbar-item"><b-icon icon="fas fa fa-github"></b-icon></a>
            <a class="navbar-item"><b-icon icon="fas fa fa-twitter"></b-icon></a>
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
                                <a href="{{url('/register')}}">Create New Account</a>
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
