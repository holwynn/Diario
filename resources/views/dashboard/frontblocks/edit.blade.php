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
                <input type="text" class="form-control border-input" name="name" value="{{ $frontblock->name }}" placeholder="Name">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Columns</label>
                <input type="text" class="form-control border-input" name="columns" value="{{ $frontblock->columnsInteger }}" placeholder="Columns">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Rows <small>(how many articles should each column contain?)</small></label>
                <input type="integer" class="form-control border-input" name="rows" value="{{ $frontblock->rows }}" placeholder="Rows">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Articles</label>
                <input id="articlesInput" type="text" class="form-control border-input" name="articles" value="{{ $frontblock->articles }}" placeholder="Articles">
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
            <div id="news-{{ $frontblock->articlesArray[0]->id }}" class="row draggableBox">
              <div class="col-md-12">
                <h3>{{ $frontblock->articlesArray[0]->title }} (# {{ $frontblock->articlesArray[0]->id }})</h3>
                <h3><small>{{ $frontblock->articlesArray[0]->slug }}</small></h3>
              </div>
            </div>

            <div id="news-{{ $frontblock->articlesArray[1]->id }}" class="row draggableBox">
              <div class="col-md-12">
                <h3>{{ $frontblock->articlesArray[1]->title }} (# {{ $frontblock->articlesArray[1]->id }})</h3>
                <h3><small>{{ $frontblock->articlesArray[1]->slug }}</small></h3>
              </div>
            </div>

            <div id="news-{{ $frontblock->articlesArray[2]->id }}" class="row draggableBox">
              <div class="col-md-12">
                <h3>{{ $frontblock->articlesArray[2]->title }} (# {{ $frontblock->articlesArray[2]->id }})</h3>
                <h3><small>{{ $frontblock->articlesArray[2]->slug }}</small></h3>
              </div>
            </div>
          </div> 
          {{-- End of column 1 --}}
          
          {{-- Start of column 2 --}}
          <div id="drag-right" class="col-md-8">
            <div id="news-{{ $frontblock->articlesArray[3]->id }}" class="row draggableBox">
              <div class="col-md-12">
                <h3>{{ $frontblock->articlesArray[3]->title }} (# {{ $frontblock->articlesArray[3]->id }})</h3>
                <h3><small>{{ $frontblock->articlesArray[3]->slug }}</small></h3>
              </div>
            </div>

            <div id="news-{{ $frontblock->articlesArray[4]->id }}" class="row draggableBox">
              <div class="col-md-12">
                <h3>{{ $frontblock->articlesArray[4]->title }} (# {{ $frontblock->articlesArray[4]->id }})</h3>
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

  var draggable = dragula(containers, {
    revertOnSpill: true
  })

  draggable.on('drop', function(el, target, source, sibling) {
      t_id = []

      for (var i = 0; i <= containers.length - 1; i++) {
          for (var j = 0; j <= containers[i].children.length - 1; j++) {
              t_id.push(containers[i].children.item(j).attributes.id.value.replace('news-', ''))
          }
      }

      console.log(t_id)
      document.querySelector('#articlesInput').value = t_id.join(',')
  })
</script>
@endsection