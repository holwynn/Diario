<div class="sidebar" data-background-color="white" data-active-color="danger">
  <div class="sidebar-wrapper">
    <div class="logo">
      <a href="{{ route('dashboard.index') }}" class="simple-text">
        {{ config('app.name') }}
      </a>
    </div>

    <ul class="nav">
      <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="{{ route('dashboard.index') }}">
          <i class="ti-panel"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="{{ Request::segment(2) == 'articles' ? 'active' : '' }}">
        <a href="{{ route('dashboard.articles.index') }}">
          <i class="ti-notepad"></i>
          <p>Articles</p>
        </a>
      </li>
      @can ('list', \App\Category::class)
      <li class="{{ Request::segment(2) == 'categories' ? 'active' : '' }}">
        <a href="{{ route('dashboard.categories.index') }}">
          <i class="ti-view-list-alt"></i>
          <p>Categories</p>
        </a>
      </li>
      @endcan
      @can ('list', \App\User::class)
      {{-- 
        We want the Users sidebar link to be active if we are editing any user
        profile or user account EXCEPT the currently logged in user, for
        which case we have 2 special links below (MY profile and MY account)
       --}}
      <li class="{{ ((Request::segment(2) == 'users' 
                  || Request::segment(2) == 'profiles')
                  && !Request::is('dashboard/profiles/'.Auth::user()->id.'/edit') 
                  && !Request::is('dashboard/users/'.Auth::user()->id.'/edit')) 
                  ? 'active' : '' }}">
        <a href="{{ route('dashboard.users.index') }}">
          <i class="ti-user"></i>
          <p>Users</p>
        </a>
      </li>
      @endcan
      <li class="{{ Request::is('dashboard/profiles/'.Auth::user()->id.'/edit') ? 'active' : '' }}">
        <a href="{{ route('dashboard.profiles.edit', ['id' => Auth::user()->id]) }}">
          <i class="ti-file"></i>
          <p>My profile</p>
        </a>
      </li>
      <li class="{{ Request::is('dashboard/users/'.Auth::user()->id.'/edit') ? 'active' : '' }}">
        <a href="{{ route('dashboard.users.edit', ['id' => Auth::user()->id]) }}">
          <i class="ti-lock"></i>
          <p>My account</p>
        </a>
      </li>
      <li class="active-pro">
        <a class="nav-link" href="{{ url('/logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" target="_top">
        <i class="ti-arrow-left"></i>
        <p>Logout</p>
      </a>

      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
    </li>
  </ul>
</div>
</div>