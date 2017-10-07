<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="images/img.jpg" alt="">Settings
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li>
              <a href="{{ route('dashboard.profiles.edit', ['id' => Auth::user()->id]) }}"> 
                My Profile
              </a>
            </li>
            <li>
              <a href="{{ route('dashboard.users.edit', ['id' => Auth::user()->id]) }}">
                <span>My Account</span>
              </a>
            </li>
            <li>
              <a href="{{ url('/logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" target="_top">
              <i class="fa fa-sign-out pull-right"></i> Log Out
            </a>
          </li>
        </ul>
      </li>
      <li class="">
        <a href="javascript:;" class="user-profile dropdown-toggle">
          {{ Auth::user()->profile->name }}
        </a>
      </li>
    </ul>
  </nav>
</div>
</div>