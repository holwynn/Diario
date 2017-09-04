<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('newspaper.name') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display|Raleway:300,400" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/dashboard/css/simple-line-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">

    <link rel="icon" type="image/x-icon" href="" />
</head>
<body>
    <div class="container">
        @yield('title')

        @yield('navbar')
    </div>

    <div class="container">
        @yield('content')
    </div>

    <hr>

    <div class="container-fluid footer">
        @yield('footer')
    </div>

    @yield('javascripts')
</body>
</html>
