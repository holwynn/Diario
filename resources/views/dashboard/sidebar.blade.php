<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
      <li>
        <a href="{{ route('dashboard.index') }}"><i class="fa fa-home"></i> Dashboard</a>
      </li>

      <li>
        <a>
          <i class="fa fa-edit"></i> Articles <span class="fa fa-chevron-down"></span>
        </a>
        <ul class="nav child_menu">
          <li><a href="{{ route('dashboard.articles.index') }}">Article List</a></li>
          <li><a href="{{ route('dashboard.articles.create') }}">New Article</a></li>
        </ul>
      </li>

      @can('list', \App\User::class)
      <li class="{{ ((Request::segment(2) == 'users' 
                  || Request::segment(2) == 'profiles')
                  && !Request::is('dashboard/profiles/'.Auth::user()->id.'/edit') 
                  && !Request::is('dashboard/users/'.Auth::user()->id.'/edit')) 
                  ? 'active' : '' }}">
        <a href="{{ route('dashboard.users.index') }}"><i class="fa fa-users"></i> Users</a>
      </li>
      @endcan

      @can('list', \App\Category::class)
      <li>
        <a href="{{ route('dashboard.categories.index') }}"><i class="fa fa-tags"></i> Categories</a>
      </li>
      @endcan

      @can('list', \App\Frontblock::class)
      <li>
        <a href="{{ route('dashboard.frontblocks.index') }}"><i class="fa fa-table"></i> Frontblocks</a>
      </li>
      @endcan
    </ul>
  </div>

  <div class="menu_section">
    <h3>User</h3>
    <ul class="nav side-menu">
      <li class="@activeRequestUri('dashboard/profiles/'.Auth::user()->id.'/edit')">
        <a href="{{ route('dashboard.profiles.edit', ['id' => Auth::user()->id]) }}">
          <i class="fa fa-user"></i> My Profile
        </a>
      </li>

      <li class="@activeRequestUri('dashboard/users/'.Auth::user()->id.'/edit')">
        <a href="{{ route('dashboard.users.edit', ['id' => Auth::user()->id]) }}">
          <i class="fa fa-lock"></i> My Account
        </a>
      </li>

      <li>
        <a href="{{ url('/logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" target="_top">
          <i class="fa fa-sign-out"></i> Log out
        </a>
      </li>

      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
    </ul>
  </div>
</div>