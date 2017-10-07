@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Users')

@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>Users </h3>
  </div>

  <div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for...">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">Go!</button>
        </span>
      </div>
    </div>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-xs-12">
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
  </div>
</div>

<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>User list <small>click on any user to edit their profile</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Username</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr class="user-tr">
              <td>{{ $user->id }}</td>
              <td>
                <a href="{{ route('dashboard.profiles.edit', ['id' => $user->id]) }}">
                  {{ $user->profile->name }}
                </a>
              </td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>

        {{ $users->links() }}
      </div>
    </div>
  </div>
</div>

@endsection