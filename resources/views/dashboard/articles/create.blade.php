@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Create Article')

@section('javascripts')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
	    <li class="breadcrumb-item">Home</li>
	    <li class="breadcrumb-item">Articles</li>
	    <li class="breadcrumb-item active">Create</li>
	</ol>
@endsection

@section('content')
	<div class="container-fluid">
	    <div class="animated fadeIn">
	        <div class="row">
	            <div class="col-sm-12">
	                <div class="card">
	                    <div class="card-header">
	                        <strong>Create article</strong>
	                    </div>
	                    <div class="card-block">

                            @if (count($errors) > 0)
                                <div class="bg-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

	                        <form action="{{ route('dashboard.articles.store') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
	                            <div class="row">
	                                <div class="col-sm-12">
	                                    <div class="form-group">
	                                        <label for="name">Title</label>
	                                        <input type="text" class="form-control" value="{{ old('title') }}" name="title" placeholder="Article title">
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="row">
	                                <div class="col-sm-12">
	                                    <div class="form-group">
	                                        <label for="ccnumber">Slug</label>
	                                        <input type="text" class="form-control" value="{{ old('slug') }}" name="slug" placeholder="Article slug (optional)">
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="row">
	                                <div class="col-sm-12">
	                                    <div class="form-group">
	                                        <label for="">Content</label>
	                                        <textarea name="content" id="" cols="30" rows="10" placeholder="Article content" class="form-control">{{ old('content') }}</textarea>
	                                    </div>
	                                </div>
	                            </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="category">Category</label>
	                                        <select name="category_id" id="category" class="form-control">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                                                @endforeach
	                                        </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="tags">Tags</label>
                                            <input type="text" class="form-control" name="tags" placeholder="Article tags (optional)">
                                        </div>
                                    </div>
                                </div>

	                            <div class="row">
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <label for="">Publish as</label>
	                                        <select name="status" id="" class="form-control">
	                                            <option value="draft">Draft</option>
	                                            @if (Auth::user()->isEditor() or Auth::user()->isAdmin())
                                                    <option value="published">Published</option>
	                                            @endif
	                                        </select>
	                                    </div>
	                                </div>
	                            </div>

                                <div class="row">
                                    <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <label for="">Show image?</label>
                                            <select name="show_image" id="" class="form-control">
	                                            <option value="0">No</option>
	                                            <option value="1">Yes</option>
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


	                            <div class="row">
	                                <div class="col-sm-12">
	                                    <div class="form-group">
	                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
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
@endsection
