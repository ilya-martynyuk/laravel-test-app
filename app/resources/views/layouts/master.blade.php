<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>@yield('title')</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('users.index') }}">Home</a>
                    </div>
                </div>
            </div>

            @yield('content')
        </div>
    </body>
</html>
