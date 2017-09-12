<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Elwynn - Dashboard</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />


  <!-- Bootstrap core CSS     -->
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Animation library for notifications   -->
  <link href="/assets/css/animate.min.css" rel="stylesheet"/>

  <!--  Paper Dashboard core CSS    -->
  <link href="/assets/css/paper-dashboard.css" rel="stylesheet"/>


  <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="/assets/css/demo.css" rel="stylesheet" />


  <!--  Fonts and icons     -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
  <link href="/assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>

  <div class="wrapper">
    @include('dashboard.sidebar')

    @yield('content')
  </div>

</body>

<!--   Core JS Files   -->
<script src="/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="/assets/js/bootstrap-checkbox-radio.js"></script>
<!--  Charts Plugin -->
<script src="/assets/js/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="/assets/js/paper-dashboard.js"></script>

  @yield('javascripts')

<script type="text/javascript">
  $(document).ready(function(){
    demo.initChartist();
  });
</script>

</html>
