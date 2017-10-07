@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Editing Frontblock')

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
</div>

<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h4 class="title">Edit frontblock</h4>
      </div>
      <div class="x_content">
        <form action="{{ route('dashboard.frontblocks.update', ['id' => $frontblock->id]) }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="PUT">

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control border-input" name="name" id="name" value="{{ $frontblock->name }}" placeholder="Name">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Articles</label>
                <input type="text" class="form-control border-input" name="name" id="name" value="{{ $frontblock->articles }}" placeholder="Name" disabled>
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
    <div class="x_panel">
      <div class="x_title">
        <h4 class="title">Articles <small>Drag and drop the articles to modify their sequence</small></h4>
      </div>
      <div class="x_content">
        <div class="row">
          {{-- Start of column 1 --}}
          <div id="drag-left" class="col-md-4">
            <div class="row draggableBox">
              <div class="col-md-12">
                <h3>{{ $frontblock->articlesArray[0]->title }}</h3>
                <h3><small>{{ $frontblock->articlesArray[0]->slug }}</small></h3>
              </div>
            </div>

            <div class="row draggableBox">
              <div class="col-md-12">
                <h3>{{ $frontblock->articlesArray[1]->title }}</h3>
                <h3><small>{{ $frontblock->articlesArray[1]->slug }}</small></h3>
              </div>
            </div>

            <div class="row draggableBox">
              <div class="col-md-12">
                <h3>{{ $frontblock->articlesArray[2]->title }}</h3>
                <h3><small>{{ $frontblock->articlesArray[2]->slug }}</small></h3>
              </div>
            </div>
          </div> 
          {{-- End of column 1 --}}

          <div class="col-md-1">
            
          </div>
          
          {{-- Start of column 2 --}}
          <div id="drag-right" class="col-md-7">
            <div class="row draggableBox">
              <div class="col-md-12">
                <h3>{{ $frontblock->articlesArray[3]->title }}</h3>
                <h3><small>{{ $frontblock->articlesArray[3]->slug }}</small></h3>
              </div>
            </div>

            <div class="row draggableBox">
              <div class="col-md-12">
                <h3>{{ $frontblock->articlesArray[4]->title }}</h3>
                <h3><small>{{ $frontblock->articlesArray[4]->slug }}</small></h3>
              </div>
            </div>
          </div>
          {{-- End of column 1 --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@section('javascripts')
<script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.js'></script>

<script>
  containers = [
    document.querySelector('#drag-left'), 
    document.querySelector('#drag-right')
  ]

  var draggable = dragula(containers)
</script>
@endsection