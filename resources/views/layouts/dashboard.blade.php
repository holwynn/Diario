<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title', 'Admin Dashboard')</title>

  <!-- Bootstrap -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="/dashboard-assets/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="/dashboard-assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="/dashboard-assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="/dashboard-assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="/dashboard-assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="/dashboard-assets/build/css/custom.min.css" rel="stylesheet">

  @yield('css')

  <link rel="icon" href="/favicon.png">

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('index') }}" class="site_title"><span>{{ config('app.name') }}</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic text-center">
              <img src="/dashboard-assets/build/images/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>{{ Auth::user()->profile->first_name }}</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br>

          <!-- sidebar menu -->
          @include('dashboard.sidebar')
          <!-- /sidebar menu -->

        </div>
      </div>

      <!-- top navigation -->
      @include('dashboard.nav')
      <!-- top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        @yield('content')
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Stormwind Herald Dashboard
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="/dashboard-assets/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="/dashboard-assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="/dashboard-assets/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="/dashboard-assets/vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="/dashboard-assets/vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="/dashboard-assets/vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="/dashboard-assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="/dashboard-assets/vendors/iCheck/icheck.min.js"></script>
  <!-- Flot -->
  <script src="/dashboard-assets/vendors/Flot/jquery.flot.js"></script>
  <script src="/dashboard-assets/vendors/Flot/jquery.flot.pie.js"></script>
  <script src="/dashboard-assets/vendors/Flot/jquery.flot.time.js"></script>
  <script src="/dashboard-assets/vendors/Flot/jquery.flot.stack.js"></script>
  <script src="/dashboard-assets/vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="/dashboard-assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="/dashboard-assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="/dashboard-assets/vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="/dashboard-assets/vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="/dashboard-assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="/dashboard-assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="/dashboard-assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="/dashboard-assets/vendors/moment/min/moment.min.js"></script>
  <script src="/dashboard-assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="/dashboard-assets/build/js/custom.min.js"></script>
  @yield('javascripts')

</body>
</html>
