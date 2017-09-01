@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Article List')

@section('breadcrumb')
	<ol class="breadcrumb">
	    <li class="breadcrumb-item">Home</li>
	    <li class="breadcrumb-item">Articles</li>
	    <li class="breadcrumb-item active">List</li>
	</ol>
@endsection

@section('content')
	<div class="container-fluid">
	    <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> <strong>Search options</strong>
                        </div>
                        <div class="card-block">
                            <form method="GET" action="{{ route("dashboard.articles.index") }}">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="">All</option>
                                                <option value="published" {{ Request::input('status') == 'published' ? 'selected' : '' }}>Published</option>
                                                <option value="draft" {{ Request::input('draft') == 'published' ? 'selected' : '' }}>Draft</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="">Table size</label>
                                            <select class="form-control" name="paginate">
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
                                            <input type="text" value="{{ Request::input('title-search') }}" name="title-search" class="form-control" placeholder="Keywords">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="">ID</label>
                                            <input type="number" value="{{ Request::input('article-id') }}" name="article-id" class="form-control" placeholder="ID">
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="checkbox" name="trashed" value="1" {{ Request::input('trashed') == 1 ? 'checked' : '' }}> Show deleted
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

	        <div class="row">
	            <div class="col-lg-12">
	                <div class="card">
	                    <div class="card-header">
	                        <i class="fa fa-align-justify"></i> <strong>Articles</strong>
	                    </div>
	                    <div class="card-block">
	                        <table class="table table-condensed">
	                            <thead>
	                                <tr>
	                                    <th>Title</th>
	                                    <th>Last modified</th>
                                        <th>Category</th>
	                                    <th>Writer</th>
	                                    <th>Status</th>
	                                </tr>
	                            </thead>
	                            <tbody>
                                    @foreach ($articles as $article)
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
                                                    <span class="badge badge-deleted">Deleted</span>
                                                @else
                                                    <span class="badge badge-{{ $article->status }}">
                                                        {{ ucfirst($article->status) }}
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
	                            </tbody>
	                        </table>

                            {{ $articles->links() }}

	                    </div>
	                </div>
	            </div>
	            <!--/.col-->
	        </div>
	        <!--/.row-->
	    </div>
	</div>
@endsection
