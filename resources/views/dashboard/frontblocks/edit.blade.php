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
                <label>Articles per column</label>
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
          @for ($i = 0; $i < count($frontblock->columns); $i++)
          <div id="drag-{{ $colcounter }}" class="draggableContainer clearfix col-md-{{ $frontblock->columns[$i] }}">
            @for($j = 0; $j < $frontblock->rows; $j++)
              @if(isset($frontblock->articlesArray[$counter]))
                <div id="news-{{ $frontblock->articlesArray[$counter]->id }}" class="row">
                  <div class="col-md-12 draggableBox">
                    <h3>{{ $frontblock->articlesArray[$counter]->title }} (# {{ $frontblock->articlesArray[$counter]->id }})</h3>
                    <h3><small>{{ $frontblock->articlesArray[$counter]->slug }}</small></h3>
                  </div>
                </div>
              @endif
              @php
                $counter++
              @endphp
            @endfor
          </div>
          @php
            $colcounter++
          @endphp
          @endfor
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@section('javascripts')
<script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.js'></script>

<script>
  containers = []

  @for ($i = 0; $i < $colcounter; $i++)
  containers.push(document.querySelector('#drag-{{ $i }}'))
  @endfor

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