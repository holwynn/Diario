@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Article List')

@section('content')
<div class="main-panel">
  @include('dashboard.nav', ['section' => 'Articles'])

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
              <h4 class="title">Search options</h4>
            </div>

            <div class="content">
              <form method="GET" action="{{ route("dashboard.articles.index") }}">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Status</label>
                      <select class="form-control border-input" name="status">
                        <option value="">All</option>
                        <option value="published" {{ Request::input('status') == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ Request::input('draft') == 'published' ? 'selected' : '' }}>Draft</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Table size</label>
                      <select class="form-control border-input" name="paginate">
                        <option value="10">10</option>
                        <option value="25" {{ Request::input('paginate') == '25' ? 'selected' : '' }}>25</option>
                        <option value="50" {{ Request::input('paginate') == '50' ? 'selected' : '' }}>50</option>
                        <option value="100" {{ Request::input('paginate') == '100' ? 'selected' : '' }}>100</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" value="{{ Request::input('title') }}" name="title" class="form-control border-input" placeholder="Title keywords">
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">ID</label>
                      <input type="number" value="{{ Request::input('id') }}" name="id" class="form-control border-input" placeholder="Article id">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Category</label>
                      <select class="form-control border-input" name="category_id">
                        <option value="">All</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ Request::input('category_id') == $category->id ? 'selected' : '' }}>{{ ucfirst($category->name) }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      {{-- TODO: checkbox seems to have a custom icon which does not work --}}
                      <input type="checkbox" name="trashed" value="1" {{ Request::input('trashed') == 1 ? 'checked' : '' }}> Show deleted articles
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <button type="submit" class="btn btn-fill btn-primary"><i class="fa fa-dot-circle-o"></i> Apply</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="header">
              <div class="pull-right">
                <a href="{{ route('dashboard.articles.create') }}">
                  <button class="btn btn-fill btn-primary">Create article</button>
                </a> 
              </div>
              <h4 class="title">Article list</h4>
            </div>
            <div class="clearfix"></div>
            <div class="content table-responsive table-full-width">
              <table class="table table-striped">
                <thead>
                  <th>Title</th>
                  <th>Last modified</th>
                  <th>Category</th>
                  <th>Writer</th>
                  <th>Status</th>
                </thead>
                <tbody>
                  @foreach($articles as $article)
                  <tr>
                    <td>
                      <a href="{{ route('dashboard.articles.edit', ['id' => $article->id]) }}">
                        {{ $article->title }}
                      </a>
                    </td>
                    <td>{{ $article->updated_at->format('F jS, Y') }}</td>
                    <td>{{ ucfirst($article->category->name) }}</td>
                    <td>{{ $article->user->profile->name}}</td>
                    <td>
                      @if ($article->trashed())
                      <span class="alert alert-danger">Deleted</span>
                      @elseif ($article->status == 'published')
                      <span class="alert alert-success">
                        {{ ucfirst($article->status) }}
                      </span>
                      @else
                      <span class="alert alert-info">
                        {{ ucfirst($article->status) }}
                      </span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="content">
              {{ $articles->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('dashboard.footer')
</div>
@endsection
