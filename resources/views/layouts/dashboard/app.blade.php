<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- @include('layouts.dashboard.title-meta') --}}
    {{-- @include('layouts.dashboard.head') --}}
    <meta charset="utf-8" />
    <title>@lang('dashboard.app_name') | @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/assets/images/icon128.png')}}">
    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('/assets/css/icons.min.css')}}" id="icons-style" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('/assets/css/app-rtl.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ URL::asset('assets/libs/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" /> --}}

    <!-- plugin css -->
    <link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" rel="stylesheet">
    <!-- plugin css -->
    <link href="{{ URL::asset('assets/libs/bootstrap-editable/bootstrap-editable.min.css') }}" rel="stylesheet" type="text/css" />

    <style>
        table.dataTable tbody tr.selected>* {
            box-shadow: inset 0 0 0 9999px rgba(79, 76, 228, 0.9) !important;
            color: #ffffff !important;
            /*font-weight: bold;*/
            /*font-size: 15px !important;*/
            transform-origin: top;
            animation: anim 0.5s ease;
        }
    </style>

    @yield('css')

</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('partials.dashboard.topbar')
        @include('partials.dashboard.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('partials.dashboard.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    {{-- @include('layouts.dashboard.right-sidebar') --}}
    <!-- /Right-bar -->
    <!-- JAVASCRIPT -->
    {{-- @include('layouts.dashboard.vendor-scripts') --}}
    <!-- JAVASCRIPT -->
    <script src="{{ URL::asset('/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/metismenu/metismenu.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/node-waves/node-waves.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/jquery-counterup/jquery-counterup.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js')}}"></script>

    <script src="{{ URL::asset('assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>

    {{-- @if(session("success"))
                    <script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js')}}"></script>
    @endif --}}

    <script>
        $('.confirm_delete').click(function(e) {
            e.preventDefault() // Don't post the form, unless confirmed
            if (confirm('@lang("dashboard.confirm_delete")')) {
                // Post the form
                $(e.target).closest('form').submit() // Post the surrounding form
            }
        });
    
    </script>

    @yield('script')

</body>

</html>