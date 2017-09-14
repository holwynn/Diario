@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Editing Profile')

@section('content')
<div class="main-panel">
  @include('dashboard.nav', ['section' => 'Profiles'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        @if (session('message'))
        <div class="alert alert-success">
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

        @if ($profile->user_id != Auth::id())
        <div class="alert alert-info">
          <span>This is not your profile! Be careful!</span>
        </div>
        @endif
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="header">
              <h4 class="title">Edit profile</h4>
            </div>
            <div class="content">
              <form action="{{ route('dashboard.profiles.update', ['id' => $profile->id]) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" class="form-control border-input" name="first_name" value="{{ $profile->first_name }}" placeholder="First Name" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" class="form-control border-input" name="last_name" value="{{ $profile->last_name }}" placeholder="Last Name">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" class="form-control border-input" name="address" value="{{ $profile->address }}" placeholder="Home Address">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>City</label>
                      <input type="text" class="form-control border-input" name="city" value="{{ $profile->city }}" placeholder="City">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Country</label>
                      <input type="text" class="form-control border-input" name="country" value="{{ $profile->country }}" placeholder="Country">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>About Me</label>
                      <textarea rows="5" class="form-control border-input" name="description" placeholder="A small description about you">{{ $profile->description }}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><i class="fa fa-twitter"></i> Twitter username</label>
                      <input type="text" class="form-control border-input" name="twitter_username" value="{{ $profile->twitter_username }}" placeholder="Twitter username">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label><i class="fa fa-facebook-official"></i> Facebook username</label>
                    <input type="text" class="form-control border-input" name="facebook_username" value="{{ $profile->facebook_username }}" placeholder="Facebook username">
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-fill">Update Profile</button>
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
