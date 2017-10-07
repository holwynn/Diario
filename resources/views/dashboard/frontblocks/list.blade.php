@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Frontblocks')

@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>Frontblocks </h3>
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
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h4 class="title">Frontblock list</h4>
      </div>
      <div class="clearfix"></div>

      <div class="x_content">
        <table class="table table-hover">
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
@endsection
