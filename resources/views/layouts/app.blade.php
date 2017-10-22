<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', config('newspaper.name'))</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Elwynn CSS -->
  <link rel="stylesheet" href="/css/elwynn.css">

  <link href="/assets/dashboard/css/simple-line-icons.css" rel="stylesheet">

  <!-- Favicon -->
  <link rel="icon" href="/favicon.png">

</head>
<body>
  <!-- Main -->
  <div class="container">
    <!-- Top navbar -->
    @yield('top-navbar')
    <!-- / Top navbar -->

    <!-- Header -->
    @yield('header')
    <!-- / Header -->

    <!-- Categories navbar -->
    @yield('categories-navbar')
    <!-- / Categories navbar -->

    <!-- Content -->  
    @yield('content')
    <!-- / Content -->  
  </div>
  <!-- / Main -->

  <!-- Footer -->
  @yield('footer')
  <!-- / Footer -->
</body>
</html>
