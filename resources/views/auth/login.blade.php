@extends('layouts.auth')

@section('content')
<div class="animate form login_form">
  <section class="login_content">
    <form id="login-form" class="form-horizontal" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
      <h1>Come on in !</h1>
      
      @if ($errors->has('name'))
      <div>
        <strong>{{ $errors->first('name') }}</strong>
      </div>

      <div>
        <strong>{{ $errors->first('password') }}</strong>
      </div>

      <br>
      @endif

      <div>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Username" required>
      </div>

      <div>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>

      <div>
        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
      </div>

      <div>
        <a class="btn btn-default submit" href="#"
        onclick="event.preventDefault();
        document.getElementById('login-form').submit();" target="_top">
        Log in
      </a>
      <a class="reset_pass" href="#">Lost your password?</a>
    </div>

    <div class="clearfix"></div>

      <div class="separator">
        <p class="change_link">Not registered?
          <a href="{{ route('register') }}" class="to_register"> Create an account! </a>
        </p>

        <div class="clearfix"></div>
        <br />

        <div>

          <h1> {{ config('app.name') }}</h1>
          <p>©2017 All Rights Reserved.</p>
        </div>
      </div>
    </form>
  </section>
</div>
@endsection
