<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page_title')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- App Scripts & Bootbox -->
    <script src="/js/app.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js" type="text/javascript"></script>

    <style>
        .fade.in {
            opacity: 1
        }
    </style>

    @yield('page_styles')

</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-sm-12" style="padding:0">
            <nav class="nav navbar navbar-light bg-light justify-content-end">
                <a class="nav-link" href="/">Calculator</a>
                <a class="nav-link" href="/currencies">Currencies</a>
                <a class="nav-link" href="/rates">Rates</a>
                <a class="nav-link" href="/calculations">Calculations</a>
            </nav>
        </div>
    </div>

    <div class="my-3">
        @yield('page_content')
    </div>

</div>

@yield('page_scripts')

</body>
</html>
