@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')

<!-- top tiles -->
<div class="row tile_count">
	<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		<span class="count_top"><i class="fa fa-user"></i> Total Users</span>
		<div class="count">2500</div>
		<span class="count_bottom"><i class="green">4% </i> From last Week</span>
	</div>
	<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		<span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
		<div class="count">123.50</div>
		<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
	</div>
	<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		<span class="count_top"><i class="fa fa-user"></i> Total Males</span>
		<div class="count green">2,500</div>
		<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
	</div>
	<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		<span class="count_top"><i class="fa fa-user"></i> Total Females</span>
		<div class="count">4,567</div>
		<span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
	</div>
	<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		<span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
		<div class="count">2,315</div>
		<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
	</div>
	<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		<span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
		<div class="count">7,325</div>
		<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
	</div>
</div>
<!-- /top tiles -->

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="dashboard_graph">

			<div class="row x_title">
				<div class="col-md-6">
					<h3>Network Activities <small>Graph title sub-title</small></h3>
				</div>
				<div class="col-md-6">
					<div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
						<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
						<span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
					</div>
				</div>
			</div>

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div id="chart_plot_01" class="demo-placeholder"></div>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>

</div>
<br />
<div class="row">
	<div class="col-md-4 col-sm-4 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Recent Activities <small>Sessions</small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="dashboard-widget-content">

					<ul class="list-unstyled timeline widget">
						<li>
							<div class="block">
								<div class="block_content">
									<h2 class="title">
										<a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
									</h2>
									<div class="byline">
										<span>13 hours ago</span> by <a>Jane Smith</a>
									</div>
									<p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="block">
								<div class="block_content">
									<h2 class="title">
										<a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
									</h2>
									<div class="byline">
										<span>13 hours ago</span> by <a>Jane Smith</a>
									</div>
									<p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
									</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>


	<div class="col-md-8 col-sm-8 col-xs-12">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Visitors location <small>geo-presentation</small></h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="dashboard-widget-content">
							<div class="col-md-4 hidden-small">
								<h2 class="line_30">125.7k Views from 60 countries</h2>

								<table class="countries_list">
									<tbody>
										<tr>
											<td>United States</td>
											<td class="fs15 fw700 text-right">33%</td>
										</tr>
										<tr>
											<td>France</td>
											<td class="fs15 fw700 text-right">27%</td>
										</tr>
										<tr>
											<td>Germany</td>
											<td class="fs15 fw700 text-right">16%</td>
										</tr>
										<tr>
											<td>Spain</td>
											<td class="fs15 fw700 text-right">11%</td>
										</tr>
										<tr>
											<td>Britain</td>
											<td class="fs15 fw700 text-right">10%</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div id="world-map-gdp" class="col-md-8 col-sm-12 col-xs-12" style="height:230px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
