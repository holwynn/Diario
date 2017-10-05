@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Editing Frontblock')

@section('content')
<div class="main-panel">
  @include('dashboard.nav', ['section' => 'Frontblocks'])

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
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="header">
              <h4 class="title">Edit frontblock</h4>
            </div>
            <div class="content">
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
          <div class="card">
            <div class="header">
              <h4 class="title">Articles</h4>
              <p>Drag and drop the articles to modify their appearance</p>
            </div>
            <div class="content">
              <div class="row">
                {{-- Start of column 1 --}}
                <div id="drag-left" class="col-md-4">
                  <div class="row draggableBox">
                    <div class="col-md-12">
                      1
                    </div>
                  </div>

                  <div class="row draggableBox">
                    <div class="col-md-12">
                      2
                    </div>
                  </div>

                  <div class="row draggableBox">
                    <div class="col-md-12">
                      3
                    </div>
                  </div>
                </div> 
                {{-- End of column 1 --}}
                
                {{-- Start of column 2 --}}
                <div id="drag-right" class="col-md-8">
                  <div class="row draggableBox">
                    <div class="col-md-12">
                      4
                    </div>
                  </div>

                  <div class="row draggableBox">
                    <div class="col-md-12">
                      5
                    </div>
                  </div>

                  <div class="row draggableBox">
                    <div class="col-md-12">
                      6
                    </div>
                  </div>
                </div>
                {{-- End of column 1 --}}
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  @include('dashboard.footer')
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