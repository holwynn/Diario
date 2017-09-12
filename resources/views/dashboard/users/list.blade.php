@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Users')

@section('content')
<div class="main-panel">
  @include('dashboard.nav', ['section' => 'Users'])

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
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="header">
              <h4 class="title">User list</h4>
            </div>
            <div class="clearfix"></div>

            <div class="content table-responsive table-full-width">
              <table class="table table-striped">
                <thead>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Country</th>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td><a href="{{ route('dashboard.profiles.edit', ['id' => $user->id]) }}">{{ ucfirst($user->profile->name) }}</a></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->profile->country }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="content">
              {{ $users->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('dashboard.footer')
</div>
@endsection
