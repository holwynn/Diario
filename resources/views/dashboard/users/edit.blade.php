@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Editing profile')

@section('breadcrumb')
	<ol class="breadcrumb">
	    <li class="breadcrumb-item">Home</li>
	    <li class="breadcrumb-item">Settings</li>
	    <li class="breadcrumb-item active">My profile</li>
	</ol>
@endsection

@section('content')
	<div class="container-fluid">
	    <div class="animated fadeIn">
	        <div class="row">
	            <div class="col-lg-6 col-md-12">
	                <div class="card">
	                    <div class="card-header">
	                        <strong>Profile settings</strong>
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

	                        <form action="{{ route('dashboard.users.update', ['id' => $user->id]) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">

	                            <div class="form-group">
	                                <div class="input-group">
	                                    <span class="input-group-addon input-group-addon-min">Name</span>
	                                    <input type="text" id="name" value="{{ $user->name }}" name="name" class="form-control">
	                                    <span class="input-group-addon"><i class="fa fa-user"></i>
	                                    </span>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <div class="input-group">
	                                    <span class="input-group-addon input-group-addon-min">Email</span>
	                                    <input type="email" id="email" value="{{ $user->email }}" name="email" class="form-control">
	                                    <span class="input-group-addon"><i class="fa fa-envelope"></i>
	                                    </span>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <div class="input-group">
	                                    <span class="input-group-addon input-group-addon-min">Password</span>
	                                    <input type="password" id="password" name="password" class="form-control">
	                                    <span class="input-group-addon"><i class="fa fa-asterisk"></i>
	                                    </span>
	                                </div>
	                            </div>

	                            <div class="row">
	                                <div class="col-sm-12">
	                                    <div class="form-group">
	                                        <label for="">Comment</label>
	                                        <textarea name="comment" id="" cols="30" rows="10" placeholder="Comment" class="form-control">{{ $user->comment }}</textarea>
	                                    </div>
	                                </div>
	                            </div>

                                @if (Auth::user()->isAdmin())
                                    <div class="row">
                                        <label for="" class="col-md-3 form-control-label">Roles</label>
                                        <div class="col-md-9">
                                            <div class="checkbox">
                                                <label for="">
                                                    <input type="checkbox" name="roles[]" value="ROLE_ADMIN" {{ ($user->isAdmin()) ? 'checked' : '' }}> Administrator
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label for="">
                                                    <input type="checkbox" name="roles[]" value="ROLE_EDITOR" {{ ($user->isEditor()) ? 'checked' : '' }}> Editor
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label for="">
                                                    <input type="checkbox" name="roles[]" value="ROLE_WRITER" {{ ($user->isWriter()) ? 'checked' : '' }}> Writer
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endif


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
