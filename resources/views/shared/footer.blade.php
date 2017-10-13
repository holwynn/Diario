<div class="footer-container">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-6">
        <h5 class="regular-font">{{ __('newspaper.categories') }}</h5>
        <ul class="list-unstyled">
          @foreach($categories as $category)
          <li><a href="#">{{ $category->name }}</a></li>
          @endforeach
        </ul>
      </div>

      <div class="col-md-4 col-sm-4 col-xs-6">
        <h5 class="regular-font">{{ __('newspaper.myaccount') }}</h5>
        <ul class="list-unstyled">
          @if(Auth::guest())
          <li><a href="{{ route('login') }}">{{ __('newspaper.login') }}</a></li>
          <li><a href="{{ route('register') }}">{{ __('newspaper.register') }}</a></li>
          @else
          <li><a href="{{ route('dashboard.index') }}">{{ __('newspaper.myaccount') }}</a></li>
          <li>
            <a href="{{ url('logout') }}" 
            onclick="event.preventDefault();document.getElementById('logout-form').submit();" target="_top">
            Logout
          </a>
        </li>

        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
        @endif
      </ul>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-6">
      <h5 class="regular-font">Get more</h5>
      <ul class="nav footer-social-media">
        <li><img src="/img/logos/facebook.png" alt=""></li>
        <li><img src="/img/logos/twitter.png" alt=""></li>
        <li><img src="/img/logos/googleplus.png" alt=""></li>
        <li><img src="/img/logos/github.png" alt=""></li>
      </ul>
    </div>
  </div>
</div>
</div>

<div class="footer-copyright">
  <p class="text-center regular-font">Stormwind Herald 2017. This site is parody. Only a fool would take anything posted here as fact.</p>
</div>