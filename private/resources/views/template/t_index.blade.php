<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Aplikasi Raport SMK N 1 Indramayu</title>
        <link rel="shortcut icon" href="{{{ asset('images/logo_port.png') }}}">
        <link rel="stylesheet" href="{{{ asset('css/bootstrap.bak1.css') }}}" media="screen">
        <link rel="stylesheet" href="{{{ asset('css/custom.css') }}}" media="screen">
    </head>
    <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a href="../"  class="brand">Aplikasi Raport SMK N 1 Indramayu</a>
            </div>
        </div>
    </div>
    @yield('content')
    @yield('modalcontent1')
    @yield('modalcontent2')
    @yield('modalcontent3')
    <script src="{{{ asset('js/jquery.js') }}}"></script>
    <script src="{{{ asset('js/bootstrap.min.js') }}}"></script>
    </body>
</html>