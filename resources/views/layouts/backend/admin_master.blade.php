<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/backend/img/favicon.ico')}}"/>
    <link href="{{asset('assets/backend/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/backend/js/loader.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{asset('assets/backend/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/backend/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>


    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @stack('css')
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
</head>
<body>

<!-- BEGIN LOADER -->
<div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
    @include('layouts.backend.partial.navbar')
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">
            <!-Sidebar->
            @include('layouts.backend.partial.sidebar')
        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        @yield('content')
        <!--  END CONTENT AREA  -->


    </div>
<!-- END MAIN CONTAINER -->
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('assets/backend/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('assets/backend/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/backend/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
{{-- <script src="{{asset('assets/backend/js/app.js')}}"></script>--}}

    <script src="{{asset('assets/backend/plugins/notify/notify.js')}}"></script>
    <script>
        //Show Console ERRor
        // $(document).ready(function() {
        //     App.init();
        // });
    </script>
    <script src="{{asset('assets/backend/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    @stack('js')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script>
        @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"

        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
</body>
</html>
