@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Editing Category')

@section('content')
<div class="main-panel">
  @include('dashboard.nav', ['section' => 'Categories'])

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
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="header">
              <h4 class="title">Edit category</h4>
            </div>
            <div class="content">
              <form action="{{ route('dashboard.categories.update', ['id' => $category->id]) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control border-input" name="name" id="name" value="{{ $category->name }}" placeholder="Name">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-fill btn-primary"><i class="fa fa-dot-circle-o"></i> Apply changes</button>
                    </div>
                  </div>
                </div>

                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="header">
              <h4 class="title">Editors</h4>
            </div>
            <div class="content">
              @if(count($category->editors) > 0)
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($category->editors as $editor)
                  <tr>
                    <td>{{ $editor->user->profile->name}}</td>
                    <td>{{ $editor->user->name }}</td>
                    <td>{{ $editor->user->email }}</td>
                    <td>
                      <form action="{{ route('dashboard.editors.destroy', ['editor' => $editor]) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">

                        <button type="submit" class="btn btn-sm btn-danger">Remove editor</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
                <p>This category does not have any editors.</p>
              @endif
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="header">
              <h4 class="title">Add an editor to this category</h4>
            </div>
            <div class="content">
              <form action="{{ route('dashboard.editors.store') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="category_id" value="{{ $category->id }}">

                <div class="row">
                  <div class="col-md-6">
                    <select name="user_id" id="" class="form-control border-input">
                      <option value="">Select an editor</option>
                      @foreach ($editors as $editor)
                        <option value="{{ $editor->id }}">{{ $editor->profile->name }} ({{ $editor->name }})</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-fill btn-primary">Add editor</button>
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
