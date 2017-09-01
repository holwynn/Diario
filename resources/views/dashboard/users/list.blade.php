@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Users')

@section('breadcrumb')
	<ol class="breadcrumb">
	    <li class="breadcrumb-item">Home</li>
	    <li class="breadcrumb-item">System</li>
	    <li class="breadcrumb-item active">Users</li>
	</ol>
@endsection

@section('content')
	<div class="container-fluid">
	    <div class="animated fadeIn">
	        <div class="row">
	            <div class="col-lg-12">
	                <div class="card">
	                    <div class="card-header">
	                        <i class="fa fa-align-justify"></i> <strong>All users</strong>
	                    </div>
	                    <div class="card-block">
	                        <table class="table table-condensed">
	                            <thead>
	                                <tr>
	                                    <th>Name</th>
	                                    <th>Username</th>
                                        <th>Email</th>
	                                    <th>Comment</th>
	                                </tr>
	                            </thead>
	                            <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <a href="{{ route('dashboard.users.edit', ['id' => $user->id]) }}">{{ $user->name }}</a>
                                            </td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->comment }}</td>
                                        </tr>
                                    @endforeach
	                            </tbody>
	                        </table>

                            {{ $users->links() }}

	                    </div>
	                </div>
	            </div>
	            <!--/.col-->
	        </div>
	        <!--/.row-->
	    </div>
	</div>
@endsection
