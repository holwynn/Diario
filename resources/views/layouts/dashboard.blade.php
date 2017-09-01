<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>@yield('title')</title>

    <!-- Icons -->
    <link href="/assets/dashboard/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/dashboard/css/simple-line-icons.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="/assets/dashboard/css/style.css" rel="stylesheet">
    <link href="/assets/dashboard/css/style-custom.css" rel="stylesheet">

    @yield('javascripts')

</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler hidden-lg-up" type="button">☰</button>
        <a class="navbar-brand" href="/"></a>
        <ul class="nav navbar-nav hidden-md-down">
            <li class="nav-item">
                <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a>
            </li>
        </ul>
    </header>

    <div class="app-body">
        @include('dashboard.sidebar')

        <!-- Main content -->
        <main class="main">

            <!-- Breadcrumb -->
            @yield('breadcrumb')
            @yield('content')
        </main>

    </div>

    <footer class="app-footer">
        <a href="http://coreui.io">CoreUI</a> © 2017 creativeLabs.
        <span class="float-right">Powered by <a href="http://coreui.io">CoreUI</a>
        </span>
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <script src="/assets/dashboard/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/assets/dashboard/bower_components/tether/dist/js/tether.min.js"></script>
    <script src="/assets/dashboard/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/dashboard/bower_components/pace/pace.min.js"></script>


    <!-- Plugins and scripts required by all views -->
    <script src="/assets/dashboarddashboard/bower_components/chart.js/dist/Chart.min.js"></script>


    <!-- GenesisUI main scripts -->

    <script src="/assets/dashboard/js/app.js"></script>


    <!-- Plugins and scripts required by this views -->

    <!-- Custom scripts required by this view -->
    <script src="/assets/dashboard/js/views/main.js"></script>

</body>

</html>
