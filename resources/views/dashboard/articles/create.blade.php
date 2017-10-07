@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Create Article')

@section('javascripts')
<script src="//cdn.ckeditor.com/4.7.2/full/ckeditor.js"></script>
<script>CKEDITOR.replace('content');</script>
@endsection

@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>Articles </h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-xs-12">
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
        <h4 class="title">Create article</h4>
      </div>
      <div class="x_content">
        <form method="POST" action="{{ route('dashboard.articles.store') }}" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control border-input" name="title" id="name" value="{{ old('title') }}" placeholder="Title">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Slug</label>
                <input type="text" class="form-control border-input" name="slug" id="slug" value="{{ old('slug') }}" placeholder="Slug">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Content</label>
                <textarea name="content" id="content" class="form-control border-input" cols="30" rows="10">{{ old('content') }}</textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Tags</label>
                <input type="text" class="form-control border-input" name="tags" value="{{ old('tags') }}" placeholder="Tags">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="category"><h4>Category</h4></label>
                <select name="category_id" id="category" class="form-control border-input">
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for=""><h4>Publish as</h4></label>
                <select name="status" id="" class="form-control border-input">
                  <option value="draft">Draft</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Show image?</label>
                <select name="show_image" id="" class="form-control border-input">
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                </select>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Image file</label>
                <input type="file" id="image" name="image form-control border-input">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <button type="submit" class="btn btn-fill btn-primary"><i class="fa fa-dot-circle-o"></i>Create article</button>
              </div>
            </div>
          </div>

          <div class="clearfix"></div>

        </form>

      </div>
    </div>
  </div>
</div>
@endsection
