<div class="row top-menu">
    <div class="col-md-4 pull-left">
        <i class="fa fa-bars"></i> <a href="#" class="text-uppercase header-link">{{ __('newspaper.menu') }}</a>
        <span class="separator"> | </span>
        <i class="fa fa-search"></i> <a href="#" class="text-uppercase header-link">{{ __('newspaper.search') }}</a>
    </div>

    <div class="col-md-4 pull-right text-right">
        @if (Auth::guest())
            <i class="fa fa-user"></i> <a class="text-uppercase header-link" href="{{ route('login') }}">{{ __('newspaper.login') }}</a>
        @else
            <i class="glyphicon glyphicon-user"></i> <a class="text-uppercase header-link" href="{{ route('dashboard') }}">{{ __('newspaper.dashboard') }}</a>
        @endif
        <span class="separator"> | </span>
        <i class="fa fa-envelope"></i> <a href="#" class="text-uppercase header-link">{{ __('newspaper.newsletter') }}</a>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <h1 class="text-center paper-font site-title"><strong><a href="/" class="title">{{ config('newspaper.name') }}</a></strong></h1>
        <p class="text-uppercase text-center header-date">{{ Carbon\Carbon::now()->formatLocalized(__('newspaper.date')) }}</p>
    </div>
</div>
