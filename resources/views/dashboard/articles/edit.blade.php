@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Editing Article')

@section('javascripts')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
	    <li class="breadcrumb-item">Home</li>
	    <li class="breadcrumb-item">Articles</li>
	    <li class="breadcrumb-item active">Edit</li>
	</ol>
@endsection

@section('content')
	<div class="container-fluid">
	    <div class="animated fadeIn">
	        <div class="row">
	            <div class="col-sm-12">
	                <div class="card">
	                    <div class="card-header">
	                        <strong>Edit article</strong>
	                    </div>
	                    <div class="card-block">

                            @if (session('message'))
                                <div class="bg-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            @if (count($errors) > 0)
                                <div class="bg-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if ($article->trashed())
                                <div class="bg-danger">
                                    You are viewing a deleted article. To edit this article, it must be restored by an Editor first.
                                </div>
                            @endif

                            @if ($article->user_id != Auth::id())
                                <div class="bg-primary">
                                    This article was written by <strong>{{ $article->user->profile->name }}</strong>. Be careful when editing articles that don't belong to you!
                                </div>
                            @endif

	                        <form method="POST" action="{{ route('dashboard.articles.update', ['id' => $article->id]) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
	                        	<input type="hidden" name="_method" value="PUT">

	                            <div class="row">
	                                <div class="col-sm-12">
	                                    <div class="form-group">
	                                        <label for="name">Title</label>
	                                        <input type="text" class="form-control" name="title" id="name" value="{{ $article->title }}" placeholder="Article title">
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="row">
	                                <div class="col-sm-12">
	                                    <div class="form-group">
	                                        <label for="slug">Slug</label>
	                                        <input type="text" class="form-control" name="slug" value="{{ $article->slug }}" placeholder="Article slug (optional)">
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="row">
	                                <div class="col-sm-12">
	                                    <div class="form-group">
	                                        <label for="">Content</label>
	                                        <textarea name="content" id="" cols="30" rows="10" placeholder="Article content" class="form-control">{{ $article->content }}</textarea>
	                                    </div>
	                                </div>
	                            </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="category">Category</label>
	                                        <select name="category_id" id="category" class="form-control">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                      {{ $article->category->id == $category->id ? 'selected=select' : '' }}>
                                                        {{ ucfirst($category->name) }}
                                                    </option>
                                                @endforeach
	                                        </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="tags">Tags</label>
                                            <input type="text" class="form-control" name="tags" value="{{ $article->tags }}" placeholder="Article tags (optional)">
                                        </div>
                                    </div>
                                </div>

	                            <div class="row">
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <label for="">Set status</label>
	                                        <select name="status" id="status" class="form-control">
                                                @if (Auth::user()->isEditor() or Auth::user()->isAdmin())
                                                    <option value="">Don't change</option>
                                                    <option value="published" {{ $article->status == 'published' ? 'selected="select"' : '' }}>Published</option>
	                                            @endif
	                                            <option value="draft" {{ $article->status == 'draft' ? 'selected="select"' : '' }}>Draft</option>
	                                        </select>
	                                    </div>
	                                </div>
	                            </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Show image?</label>
                                            <select name="show_image" id="" class="form-control">
                                                <option value="0" {{ $article->show_image == false ? 'selected="select"' : '' }}>No</option>
                                                <option value="1" {{ $article->show_image == true ? 'selected="select"' : ''}}>Yes</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <div class="col-md-9">
                                                <input type="file" id="image_file" name="image_file">
                                            </div>
                                        </div>
                                    </div>
                                </div>

	                            @if (!$article->trashed())
                                    <div class="row">
    	                                <div class="col-sm-12">
    	                                    <div class="form-group">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Apply changes</button>
    	                                    </div>
    	                                </div>
    	                            </div>
                                @endif

	                        </form>
	                    </div>
	                </div>
	            </div>
	        </div>

            @if (Auth::user()->isEditor() or Auth::user()->isAdmin())
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Danger zone</strong>
                            </div>
                            <div class="card-block">
                                @if ($article->trashed())
                                    <form method="POST" action="{{ route('dashboard.articles.restore', ['id' => $article->id]) }}">
                                        {{ csrf_field() }}
                                        <button class="btn btn-sm btn-primary"><i class="fa fa-ban"></i> Restore article</button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('dashboard.articles.delete', ['id' => $article->id]) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Delete article</button>
                                    </form>

                                    
                                @endif
                
                                <hr>

                                @can('destroy', $article)
                                    <form method="POST" action="{{ route('dashboard.articles.destroy', ['id' => $article->id]) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Destroy article</button>
                                    </form>
                                @endcan
                                
                            </div>
                        </div>
                    </div>
                </div>
            @endif
	    </div>
	</div>
@endsection
