@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')
<div class="main-panel">
	@include('dashboard.nav', ['section' => 'Dashboard'])

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-warning text-center">
										<i class="ti-server"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p>Articles</p>
										{{ $articlesCount }}
									</div>
								</div>
							</div>
							{{-- No need for these footers yet but they are pretty cool --}}
							{{-- <div class="footer">
								<hr />
								<div class="stats">
									<i class="ti-reload"></i> All time
								</div>
							</div> --}}
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-success text-center">
										<i class="ti-wallet"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p>Comments</p>
										{{ $commentsCount }}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-danger text-center">
										<i class="ti-pulse"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p>Total users</p>
										{{ $usersCount }}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-info text-center">
										<i class="ti-twitter-alt"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p>Followers</p>
										{{ $followersCount }}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">

				<div class="col-md-12">
					<div class="card">
						<div class="header">
							<h4 class="title">Users Behavior</h4>
							<p class="category">24 Hours performance</p>
						</div>
						<div class="content">
							<div id="chartHours" class="ct-chart"></div>
							<div class="footer">
								<div class="chart-legend">
									<i class="fa fa-circle text-info"></i> Open
									<i class="fa fa-circle text-danger"></i> Click
									<i class="fa fa-circle text-warning"></i> Click Second Time
								</div>
								<hr>
								<div class="stats">
									<i class="ti-reload"></i> Updated 3 minutes ago
								</div>
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
