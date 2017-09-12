<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">{{ $section }}</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="#">
            <i class="ti-user"></i>
            <p>{{ Auth::user()->profile->name }}</p>
          </a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="ti-settings"></i>
            <p>Settings</p>
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="{{ url('/logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" target="_top">Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>