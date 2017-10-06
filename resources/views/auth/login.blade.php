@extends('layouts.auth')

@section('content')
<div class="animate form login_form">
  <section class="login_content">
    <form id="login-form" class="form-horizontal" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
      <h1>Come on in !</h1>
      
      <div>
        @if ($errors->has('name'))
        <strong>{{ $errors->first('name') }}</strong>
        @endif
      </div>

      <div>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Username" required>
      </div>

      <div>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>

      <div>
        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember?
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

      {{-- <div class="separator">
        <p class="change_link">New to site?
          <a href="#signup" class="to_register"> Create Account </a>
        </p>

        <div class="clearfix"></div>
        <br />

        <div>
          <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
          <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
        </div>
      </div> --}}
    </form>
  </section>
</div>
@endsection
