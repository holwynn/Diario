@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Categories')

@section('content')
<div class="main-panel">
  @include('dashboard.nav', ['section' => 'Categories'])

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
              <h4 class="title">Categories</h4>
            </div>
            <div class="clearfix"></div>

            <div class="content table-responsive table-full-width">
              <table class="table table-striped">
                <thead>
                  <th>Name</th>
                  <th>Options</th>
                </thead>
                <tbody>
                  @foreach($categories as $category)
                  <tr>
                    <td>
                      <a href="{{ route('dashboard.categories.edit', ['id' => $category->id]) }}">{{ ucfirst($category->name) }}</a>
                    </td>
                    <td>
                      <i class="fa fa-trash fa-lg"></i>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="header">
              <h4 class="title">Create new category</h4>
            </div>
            <div class="content">
              <form action="{{ route('dashboard.categories.store') }}" method="post">
                {{ csrf_field() }}

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" id="name" name="name" class="border-input form-control" placeholder="Name">
                    </div> 
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group form-actions">
                      <button type="submit" class="btn btn-fill btn-primary">Create</button>
                    </div>
                  </div>
                </div>

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
