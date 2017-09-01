<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.index') }}"><i class="icon-speedometer"></i> Dashboard </a>
            </li>

            <li class="nav-title">
                Administration
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Articles</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.articles.index') }}"><i class="icon-puzzle"></i> List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.articles.create') }}"><i class="icon-puzzle"></i> Create</a>
                    </li>

                    @if (Request::route()->getName() == 'dashboard.articles.edit')
                        <a class="nav-link" href="/{{ Request::path() }}"><i class="icon-puzzle"></i> Editing</a>
                    @endif
                </ul>
            </li>

            @if (Auth::user()->isAdmin())
                <li class="divider"></li>
                <li class="nav-title">
                    System
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.users.index') }}" target="_top"><i class="icon-star"></i> Users</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.categories.index') }}"><i class="icon-puzzle"></i> Categories</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.frontblocks.index') }}"><i class="icon-puzzle"></i> Frontblocks</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="pages-register.html" target="_top"><i class="icon-star"></i> Logs</a>
                </li>
            @endif

            <li class="divider"></li>
            <li class="nav-title">
                Settings
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.users.edit', ['id' => Auth::id()]) }}" target="_top"><i class="icon-star"></i> My profile</a>
            </li>

            <li class="nav-item">

                <a class="nav-link" href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" target="_top">
                    <i class="icon-star"></i> Logout
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>

        </ul>
    </nav>
</div>
