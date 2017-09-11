<div class="sidebar" data-background-color="white" data-active-color="danger">
  <div class="sidebar-wrapper">
    <div class="logo">
      <a href="{{ route('dashboard.index') }}" class="simple-text">
        Elwynn
      </a>
    </div>

    <ul class="nav">
      <li class="{{ starts_with(Request::route()->getName(), 'dashboard.index') ? 'active' : '' }}">
        <a href="{{ route('dashboard.index') }}">
          <i class="ti-panel"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="{{ starts_with(Request::route()->getName(), 'dashboard.articles') ? 'active' : '' }}">
        <a href="{{ route('dashboard.articles.index') }}">
          <i class="ti-notepad"></i>
          <p>Articles</p>
        </a>
      </li>
      @can('view', \App\Category::class)
      <li class="{{ starts_with(Request::route()->getName(), 'dashboard.categories') ? 'active' : '' }}">
        <a href="{{ route('dashboard.categories.index') }}">
          <i class="ti-view-list-alt"></i>
          <p>Categories</p>
        </a>
      </li>
      @endcan
      <li class="{{ starts_with(Request::route()->getName(), 'dashboard.profiles') ? 'active' : '' }}">
        <a href="profile.html">
          <i class="ti-user"></i>
          <p>My profile</p>
        </a>
      </li>
      <li class="{{ starts_with(Request::route()->getName(), 'dashboard.account') ? 'active' : '' }}">
        <a href="account.html">
          <i class="ti-lock"></i>
          <p>Account settings</p>
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