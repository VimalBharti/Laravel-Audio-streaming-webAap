<aside class="column is-2 aside hero is-fullheight is-hidden-mobile">
  <div class="">
    <div class="compose has text-centered">
      <a href="{{route('members.create')}}" class="button is-block is-bold compose-btn">
        <span class="icon">
          <i class="fa fa-plus"></i>
        </span>
        <span>Compose</span>
      </a>
    </div>
    <div class="main">
      <a href="{{route('member.dashboard')}}" class="item active">
        <span class="icon"><i class="fa fa-heart"></i></span>
        <span class="love">All Freebies</span>
      </a>
      <a href="{{route('profiles.show', $user->username)}}" class="item">
        <span class="icon"><i class="fa fa-user-circle-o"></i></span>
        <span class="name">Profile</span>
      </a>
    </div>
  </div>
</aside>
