@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Editing Category')

@section('breadcrumb')
	<ol class="breadcrumb">
	    <li class="breadcrumb-item">Home</li>
	    <li class="breadcrumb-item">Administration</li>
	    <li class="breadcrumb-item active">Categories</li>
	</ol>
@endsection

@section('content')
	<div class="container-fluid">
	    <div class="animated fadeIn">
	        <div class="row">
	            <div class="col-md-12">
	                <div class="card">
	                    <div class="card-header">
	                        <strong>Category</strong>
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

	                        <form action="{{ route('dashboard.categories.update', ['id' => $category->id]) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">

	                            <div class="form-group">
	                                <div class="input-group">
	                                    <span class="input-group-addon input-group-addon-min">Name</span>
	                                    <input type="text" id="name" value="{{ ucfirst($category->name) }}" name="name" class="form-control">
	                                </div>
	                            </div>

	                            <div class="form-group form-actions">
	                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
	                            </div>
	                        </form>
                            
                            {{-- There's not much point to deleting a category, but we could if we wanted --}}
                            {{-- <form action="{{ route('dashboard.categories.delete', ['category' => $category]) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">

                                <div class="form-group form-actions">
                                    <button type="submit" class="btn btn-sm btn-danger">Delete category</button>
                                </div>
                            </form> --}}
	                    </div>
	                </div>
	            </div>
	        </div>

            <div class="row">
	            <div class="col-md-12">
	                <div class="card">
	                    <div class="card-header">
	                        <strong>Editors</strong>
	                    </div>
	                    <div class="card-block">
                            @if (count($category->editors) > 0)
                                <table class="table table-condensed">
    	                            <thead>
    	                                <tr>
    	                                    <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Options</th>
    	                                </tr>
    	                            </thead>
    	                            <tbody>
                                        @foreach($category->editors as $editor)
                                            <tr>
                                                <td>{{ $editor->user->profile->name}}</td>
                                                <td>{{ $editor->user->name }}</td>
                                                <td>{{ $editor->user->email }}</td>
                                                <td>
                                                    <form action="{{ route('dashboard.editors.destroy', ['editor' => $editor]) }}" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="DELETE">

                                                        <div class="form-group form-actions">
                        	                                <button type="submit" class="btn btn-sm btn-danger">Remove editor</button>
                        	                            </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
    	                            </tbody>
    	                        </table>
                            @else
                                <p>This category has no editors. Add one!</p>
                            @endif
	                    </div>
	                </div>
	            </div>
	        </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Add editor to this category</strong>
                        </div>
                        <div class="card-block">
                            <form action="{{ route('dashboard.editors.store') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="category_id" value="{{ $category->id }}">

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <select id="user" name="user_id" class="form-control" size="1" required>
                                            <option value="">Select a qualified Editor</option>
                                            @foreach ($editors as $editor)
                                                <option value="{{ $editor->id }}">{{ $editor->profile->name }} ({{ $editor->name }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group form-actions">
                                    <button type="submit" class="btn btn-sm btn-primary">Add editor</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
	    </div>
	</div>
@endsection
