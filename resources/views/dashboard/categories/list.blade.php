@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Categories')

@section('breadcrumb')
	<ol class="breadcrumb">
	    <li class="breadcrumb-item">Home</li>
	    <li class="breadcrumb-item">Categories</li>
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
	                        <i class="fa fa-align-justify"></i> <strong>All categories</strong>
	                    </div>
	                    <div class="card-block">

                            @if (session('message'))
	                    	    <div class="bg-success">
                                    {{ session('message') }}
	                    	    </div>
                            @endif

	                        <table class="table table-condensed">
	                            <thead>
	                                <tr>
	                                    <th>Name</th>
	                                    <th>Options</th>
	                                </tr>
	                            </thead>
	                            <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>
                                                <a href="{{ route('dashboard.categories.edit', ['id' => $category->id]) }}">{{ ucfirst($category->name) }}</a>
                                            </td>
                                            <td>
                                                <i class="fa fa-trash fa-lg"></i>
                                                {{-- <span class="badge badge-danger">
													<a class="white-link" href="#"></a>
												</span> --}}
                                            </td>
                                        </tr>
                                    @endforeach
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	            </div>
	        </div>

          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> <strong>Create new category</strong>
                    </div>

                      <div class="card-block">
                          <form action="{{ route('dashboard.categories.store') }}" method="post">
                              {{ csrf_field() }}

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-min">Name</span>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>

                            <div class="form-group form-actions">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </form>
                      </div>
                  </div>
              </div>
          </div>
	    </div>
	</div>
@endsection
