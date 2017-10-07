@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Editing Profile')

@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>Profiles </h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-xs-12">
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
</div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{ $profile->name }} Profile</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form data-parsley-validate class="form-horizontal form-label-left" action="{{ route('dashboard.profiles.update', ['id' => $profile->id]) }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="PUT">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">First Name</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="first_name" value="{{ $profile->first_name }}" placeholder="First Name">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Name</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="last_name" value="{{ $profile->last_name }}" placeholder="Last Name">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="address" value="{{ $profile->address }}" placeholder="Address">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="city" value="{{ $profile->city }}" placeholder="City">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="country" value="{{ $profile->country }}" placeholder="Country">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <textarea id="" cols="30" rows="10" name="description" class="form-control">{{ $profile->description }}</textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Twitter Username</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="twitter_username" value="{{ $profile->twitter_username }}" placeholder="Twitter Username">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Facebook Username</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="facebook_username" value="{{ $profile->facebook_username }}" placeholder="Facebook Username">
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
