@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Editing User')

@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>Users </h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12">
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
      <span>This is not you! Be careful!</span>
    </div>
    @endif
  </div>
</div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{ $user->profile->name }} Settings</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form data-parsley-validate class="form-horizontal form-label-left" action="{{ route('dashboard.users.update', ['id' => $user->id]) }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="PUT">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" value="{{ $user->name }}" placeholder="Username" disabled>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Password</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="password" class="form-control" name="current_password" value="password" placeholder="Current Password">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">New Password</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
              </div>
            </div>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
