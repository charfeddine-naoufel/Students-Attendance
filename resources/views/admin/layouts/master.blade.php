<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link id="gull-theme" rel="stylesheet" href="{{asset('assets/styles/css/themes/lite-purple.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/css/select2.min.css')}}">


</head>

<body class="text-left">
    <!-- Pre Loader Strat  -->
    <!-- <div class='loadscreen' id="preloader">

        <div class="loader spinner-bubble spinner-bubble-primary">



        </div>
    </div> -->
    <!-- Pre Loader end  -->
    
    @yield('content')
    
    <!--=============== End app-admin-wrap ================-->

    <!-- ============ Search UI Start ============= -->
    
    <!-- ============ Search UI End ============= -->

    <script src="{{asset('assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>

    <script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
    <script src="{{asset('assets/js/es5/dashboard.v1.script.min.js')}}"></script>

    <script src="{{asset('assets/js/es5/script.min.js')}}"></script>
    <script src="{{asset('assets/js/es5/sidebar.large.script.min.js')}}"></script>
     <script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script> 

    <!-- <script src="{{asset('assets/js/sweetalert.script.js')}}"></script>  -->

    <script src="{{asset('assets/js/modal.script.js')}}"></script>
    @yield('scripts')
</body>

</html>