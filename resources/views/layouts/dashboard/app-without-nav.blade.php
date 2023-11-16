<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title>@lang('dashboard.app_name') | Login </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('/assets/images/icon128.png')}}">
        <!-- Bootstrap Css -->
        <link href="{{ URL::asset('/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet"
            type="text/css" />
        <!-- Icons Css -->
        {{-- <link href="{{ URL::asset('/assets/css/icons.min.css')}}" id="icons-style" rel="stylesheet" type="text/css" /> --}}
        <!-- App Css-->
        <link href="{{ URL::asset('/assets/css/app-rtl.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        {{-- <link href="{{ URL::asset('assets/libs/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" /> --}}
    </head>


    <body class="authentication-bg">
        @yield('content')

        <!-- JAVASCRIPT -->
        <script src="{{ URL::asset('/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ URL::asset('/assets/libs/bootstrap/bootstrap.min.js')}}"></script>
        {{-- <script src="{{ URL::asset('/assets/libs/metismenu/metismenu.min.js')}}"></script>
        <script src="{{ URL::asset('/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ URL::asset('/assets/libs/node-waves/node-waves.min.js')}}"></script>
        <script src="{{ URL::asset('/assets/libs/waypoints/waypoints.min.js')}}"></script>
        <script src="{{ URL::asset('/assets/libs/jquery-counterup/jquery-counterup.min.js')}}"></script>
        <script src="{{ URL::asset('/assets/js/app.min.js')}}"></script> --}}
    </body>
</html>
