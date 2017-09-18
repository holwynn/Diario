<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="">{{ config('newspaper.name') }}</h2>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-3 col-xs-6">
                <h5 class="text-uppercase"><strong>{{ __('newspaper.categories') }}</strong></h5>
                <ul class="list-unstyled">
                    @foreach ($categories as $category)
                        <li><a class="footer-link footer-category" href="#">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-sm-3 col-xs-6">
                <h5 class="text-uppercase"><strong>{{ __('newspaper.myaccount') }}</strong></h5>
                <ul class="list-unstyled">
                    @if (Auth::guest())
                        <li><a class="footer-link" href="{{ route('login') }}">{{ __('newspaper.login') }}</a></li>
                        <li><a class="footer-link" href="{{ route('register') }}">{{ __('newspaper.register') }}</a></li>
                    @else
                        <li><a class="footer-link" href="{{ route('dashboard.index') }}">{{ __('newspaper.myaccount') }}</a></li>
                        <li>
                            <a class="footer-link" href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" target="_top">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="col-sm-3 col-xs-6">
                <h5 class="text-uppercase"><strong>{{ __('newspaper.community') }}</strong></h5>
                <ul class="list-unstyled">
                    <li><a class="footer-link" href="#">{{ __('newspaper.blog') }}</a></li>
                    <li><a class="footer-link" href="#">{{ __('newspaper.newsletter') }}</a></li>
                    <br>
                    <li>
                        <img src="/img/logos/facebook.png" alt="">
                        <img src="/img/logos/twitter.png" alt="">
                        <img src="/img/logos/googleplus.png" alt="">
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>

<div class="row footer-bottom">
    <p>Stormwind Herald 2017 | This site is parody, mainly just to show a demo of <a href="#">Elwynn</a>.</p>
</div>