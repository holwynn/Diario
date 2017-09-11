@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Editing user')

@section('content')
<div class="main-panel">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Users</a>
      </div>
    </div>
  </nav>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        @if (session('message'))
        <div class="alert alert-info">
          <span>{{ session('message') }}</span>
        </div>
        @endif

        @if (count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
          <span>{{ $error }}</span>
          @endforeach
        </div>
        @endif

        @if ($user->id != Auth::id())
        <div class="alert alert-info">
          <span>This is not your user settings! Be careful!</span>
        </div>
        @endif
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="header">
              <h4 class="title">Edit settings</h4>
            </div>
            <div class="content">
              <form action="{{ route('dashboard.users.update', ['id' => $user->id]) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control border-input" value="{{ $user->name }}" disabled>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control border-input" name="email" value="{{ $user->email }}" placeholder="Email">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Current password</label>
                      <input type="password" class="form-control border-input" name="current_password" value="password" placeholder="Password">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>New password</label>
                      <input type="password" class="form-control border-input" name="password" placeholder="Password">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-fill">Update settings</button>
                  </div>
                </div>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('dashboard.footer')
</div>
@endsection
