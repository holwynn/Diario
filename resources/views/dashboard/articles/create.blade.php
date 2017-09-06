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
	                                        <label for="name"><h4>Title</h4></label>
	                                        <input type="text" class="form-control" value="{{ old('title') }}" name="title" placeholder="Article title">
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="row">
	                                <div class="col-sm-12">
	                                    <div class="form-group">
	                                        <label for="ccnumber"><h4>Slug</h4></label>
	                                        <input type="text" class="form-control" value="{{ old('slug') }}" name="slug" placeholder="Article slug (optional)">
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="row">
	                                <div class="col-sm-12">
	                                    <div class="form-group">
	                                        <label for=""><h4>Content</h4></label>
	                                        <textarea name="content" id="" cols="30" rows="10" placeholder="Article content" class="form-control">{{ old('content') }}</textarea>
	                                    </div>
	                                </div>
	                            </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="category"><h4>Category</h4></label>
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
                                            <label for="tags"><h4>Tags</h4></label>
                                            <input type="text" class="form-control" name="tags" placeholder="Article tags (optional)">
                                        </div>
                                    </div>
                                </div>

	                            <div class="row">
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <label for=""><h4>Publish as</h4></label>
	                                        <select name="status" id="" class="form-control">
	                                            <option value="draft">Draft</option>
	                                        </select>
	                                    </div>
	                                </div>
	                            </div>

                                <div class="row">
                                    <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <label for=""><h4>Show image?</h4></label>
                                            <select name="show_image" class="form-control">
	                                            <option value="0">No</option>
	                                            <option value="1">Yes</option>
	                                        </select>
	                                    </div>
	                                </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for=""><h4>Image file</h4></label>
                                            <div class="col-md-9">
                                                <input type="file" id="image" name="image">
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
