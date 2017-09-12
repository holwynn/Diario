@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Editing Article')

@section('javascripts')
{{-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script> --}}
<script src="//cdn.ckeditor.com/4.7.2/full/ckeditor.js"></script>
<script>CKEDITOR.replace('content');</script>
@endsection

@section('content')
<div class="main-panel">
  @include('dashboard.nav', ['section' => 'Articles'])

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

        @if ($article->trashed())
        <div class="alert alert-danger">
          <span>You are viewing a deleted article. To edit this article, it must be restored by an Editor first.</span>
        </div>
        @endif

        @if ($article->user_id != Auth::id())
        <div class="alert alert-info">
          <span>This article was written by <strong>{{ $article->user->profile->name }}</strong>. Be careful when editing articles that don't belong to you!</span>
        </div>
        @endif
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="header">
              <div class="pull-left">
                <h4 class="title">Edit article</h4>
              </div>
              <div class="pull-right">
                <h4 class="title"><a href="{{ route('article', ['title' => $article->seoUrl(), 'article' => $article->id]) }}" target="_blank">View article</a></h4>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="content">
              <form method="POST" action="{{ route('dashboard.articles.update', ['id' => $article->id]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control border-input" name="title" id="name" value="{{ $article->title }}" placeholder="Title">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Slug</label>
                      <input type="text" class="form-control border-input" name="slug" id="slug" value="{{ $article->slug }}" placeholder="Slug">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Content</label>
                      <textarea name="content" id="content" class="form-control border-input" cols="30" rows="10">{{ $article->content }}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Tags</label>
                      <input type="text" class="form-control border-input" name="tags" value="{{ $article->tags }}" placeholder="Tags">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="category">Category</label>
                      <select name="category_id" id="category" class="form-control border-input">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                          {{ $article->category->id == $category->id ? 'selected=select' : '' }}>
                          {{ ucfirst($category->name) }}
                        </option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Status</label>
                      <select name="status" id="status" class="form-control border-input">
                        @can('publish', $article)
                        <option value="published" {{ $article->status == 'published' ? 'selected="select"' : '' }}>Published</option>
                        @endcan
                        <option value="draft" {{ $article->status == 'draft' ? 'selected="select"' : '' }}>Draft</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Show image?</label>
                      <select name="show_image" id="" class="form-control border-input">
                        <option value="0" {{ $article->show_image == false ? 'selected="select"' : '' }}>No</option>
                        <option value="1" {{ $article->show_image == true ? 'selected="select"' : ''}}>Yes</option>
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

                @if (!$article->trashed())
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-fill btn-primary"><i class="fa fa-dot-circle-o"></i> Apply changes</button>
                    </div>
                  </div>
                </div>
                @endif

                <div class="clearfix"></div>

              </form>
            </div>
          </div>
        </div>
      </div>

      @if (Auth::user()->isEditor() or Auth::user()->isAdmin())
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="header">
              <h4 class="title">Danger zone</h4>
            </div>
            <div class="content">
              @if ($article->trashed())
              <form method="POST" action="{{ route('dashboard.articles.restore', ['id' => $article->id]) }}">
                {{ csrf_field() }}
                <button class="btn btn-fill btn-primary"><i class="fa fa-ban"></i> Restore article</button>
              </form>
              @else
              <form method="POST" action="{{ route('dashboard.articles.delete', ['id' => $article->id]) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-fill btn-danger"><i class="fa fa-ban"></i> Delete article</button>
              </form>
              @endif

              <hr>

              @can('destroy', $article)
              <form method="POST" action="{{ route('dashboard.articles.destroy', ['id' => $article->id]) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-fill btn-danger"><i class="fa fa-ban"></i> Destroy article</button>
              </form>
              @endcan
            </div>
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
  @include('dashboard.footer')
</div>
@endsection
