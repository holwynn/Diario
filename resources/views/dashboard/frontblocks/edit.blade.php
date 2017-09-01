@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Editing Layout')

@section('breadcrumb')
	<ol class="breadcrumb">
	    <li class="breadcrumb-item">Home</li>
	    <li class="breadcrumb-item">Layouts</li>
	    <li class="breadcrumb-item active">Edit</li>
	</ol>
@endsection

@section('content')
	<div class="container-fluid">
	    <div class="animated fadeIn">
	        <div class="row">
	            <div class="col-lg-6 col-md-12">
	                <div class="card">
	                    <div class="card-header">
	                        <strong>Layout</strong>
	                    </div>
	                    <div class="card-block">

                            @if (session('message'))
	                    	    <div class="bg-success">
                                    {{ session('message') }}
	                    	    </div>
                            @endif

                            @if (count($errors) > 0)
                                <div class="">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

	                        <form action="{{ route('dashboard.layouts.update', ['id' => $layout->id]) }}" method="post">
                                {{ csrf_field() }}

                                <input type="hidden" name="_method" value="PUT">

	                            <div class="form-group">
	                                <div class="input-group">
	                                    <span class="input-group-addon input-group-addon-min">Name</span>
	                                    <input type="text" id="name" value="{{ ucfirst($layout->name) }}" name="name" class="form-control">
	                                </div>
	                            </div>

                                @foreach ($blocks as $name => $article_id)
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon input-group-addon-min">{{ $name }}</span>
                                            <input type="text" id="article_ids" value="{{ $article_id }}" name="article_ids[]" class="form-control">
                                        </div>
                                    </div>
                                @endforeach

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
