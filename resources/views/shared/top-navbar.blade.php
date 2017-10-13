<div class="row hidden-xs-down">
  <div class="col-md-12 clearfix">
    <div class="top-navbar">
      <ul class="nav float-left">
        <li class="top-navbar-item"><i class="fa fa-bars"></i> <a href="#" class="text-uppercase">{{ __('newspaper.menu') }}</a></li>
        <li class="top-navbar-item"> | </li>
        <li class="top-navbar-item"><i class="fa fa-search"></i> <a href="#" class="text-uppercase">{{ __('newspaper.search') }}</a></li>
      </ul>

      <ul class="nav float-right">
        @if(Auth::guest())
        <li class="top-navbar-item"><i class="fa fa-user"></i> <a href="{{ route('login') }}" class="text-uppercase"> Login</a></li>
        @else
        <li class="top-navbar-item"><i class="fa fa-user"></i> <a href="{{ route('dashboard.index') }}" class="text-uppercase"> Dashboard</a></li>
        @endif
        <li class="top-navbar-item"> | </li>
        <li class="top-navbar-item"><i class="fa fa-envelope"></i> <a href="#" class="text-uppercase"> Newsletter</a></li>
      </ul>
    </div>
  </div>
</div>  