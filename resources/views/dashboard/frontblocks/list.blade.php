@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Frontblocks')

@section('content')
<div class="main-panel">
  @include('dashboard.nav', ['section' => 'Frontblocks'])

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
                  <tr>
                    <th>Name</th>
                    <th>Articles</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($frontblocks as $frontblock)
                  <tr>
                    <td>
                      <a href="{{ route('dashboard.frontblocks.edit', ['id' => $frontblock->id]) }}">
                        {{ ucfirst($frontblock->name) }}
                      </a>
                    </td>
                    <td>{{ $frontblock->articles }}</td>
                    <td>Use</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('dashboard.footer')
</div>
@endsection
