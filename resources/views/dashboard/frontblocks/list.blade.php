@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Categories')

@section('breadcrumb')
	<ol class="breadcrumb">
	    <li class="breadcrumb-item">Home</li>
	    <li class="breadcrumb-item">Layouts</li>
	    <li class="breadcrumb-item active">List</li>
	</ol>
@endsection

@section('content')
	<div class="container-fluid">
	    <div class="animated fadeIn">
	        <div class="row">
	            <div class="col-lg-6">
	                <div class="card">
	                    <div class="card-header">
	                        <i class="fa fa-align-justify"></i> <strong>All layouts</strong>
	                    </div>
	                    <div class="card-block">
	                        <table class="table table-condensed">
	                            <thead>
	                                <tr>
	                                    <th>Name</th>
	                                    <th>Options</th>
	                                </tr>
	                            </thead>
	                            <tbody>
                                    @foreach($layouts as $layout)
                                        <tr>
                                            <td>
                                                <a href="{{ route('dashboard.layouts.edit', ['id' => $layout->id]) }}">{{ ucfirst($layout->name) }}</a>
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
	    </div>
	</div>
@endsection
