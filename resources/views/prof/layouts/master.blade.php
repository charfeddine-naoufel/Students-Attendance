<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="42W8IaY1w7BErjQOEH7syA4lyNyWBkWkLdgnmhgB">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@500&family=Cairo:wght@400;500&family=Noto+Naskh+Arabic:wght@600&display=swap" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@500&display=swap" rel="stylesheet">  -->
    <link id="gull-theme" rel="stylesheet" href="{{asset('assets/styles/css/themes/lite-purple.min.css')}}">
    <link id="gull-theme" rel="stylesheet" href="{{asset('assets/fonts/fontawesome-free-5.12.1-web/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/css/select2.min.css')}}">
    <!-- <link id="gull-theme" rel="stylesheet" href="http://gull-html-laravel.ui-lib.com/assets/styles/css/themes/lite-purple.min.css">
        <link rel="stylesheet" href="http://gull-html-laravel.ui-lib.com/assets/styles/vendor/perfect-scrollbar.css"> -->
    @yield('customstyle')
</head>


<body class="text-left">

    <!-- Pre Loader Strat  -->
    <!-- <div class='loadscreen' id="preloader">

        <div class="loader spinner-bubble spinner-bubble-primary">


        </div>
    </div> -->
    <!-- Pre Loader end  -->







    <!-- ============ Compact Layout start ============= -->

    <div class="app-admin-wrap layout-sidebar-compact sidebar-dark-purple sidenav-open clearfix">
        <div class="side-content-wrap">

            @include('prof.layouts.menu')

            <div class="sidebar-overlay"></div>
        </div>
        <!--=============== Left side End ================-->
        <!-- ============ end of left sidebar ============= -->


        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap d-flex flex-column">
            <div class="main-header">
                <div class="logo">
                    <img src="{{asset('assets/images/logo.png')}}" alt="">
                </div>

                <div class="menu-toggle">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>

                <div class="d-flex align-items-center">

                    <div class="search-bar">
                        <input type="text" placeholder="Search">
                        <i class="search-icon text-muted i-Magnifi-Glass1"></i>
                    </div>
                </div>

                <div style="margin: auto"></div>

                <div class="header-part-right">
                    <!-- Full screen toggle -->
                    <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
                    <!-- Grid menu Dropdown -->

                    <!-- Notificaiton -->
                    <div class="dropdown">
                        <div class="badge-top-container" role="button" id="dropdownNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="badge badge-primary">3</span>
                            <i class="i-Bell text-muted header-icon"></i>
                        </div>
                        <!-- Notification dropdown -->
                        <div class="dropdown-menu dropdown-menu-right notification-dropdown rtl-ps-none" aria-labelledby="dropdownNotification" data-perfect-scrollbar data-suppress-scroll-x="true">
                            <div class="dropdown-item d-flex">
                                <div class="notification-icon">
                                    <i class="i-Speach-Bubble-6 text-primary mr-1"></i>
                                </div>

                            </div>



                        </div>
                    </div>
                    <!-- Notificaiton End -->

                    <!-- User avatar dropdown -->
                    <div class="dropdown">
                <div class="user col align-self-end">
                    <img src="{{asset('assets/images/logon.png')}}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-header">
                            <i class="i-Lock-User mr-1"></i> {{Auth::user()->name}}
                        </div>
                        <a class="dropdown-item">Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
                </div>

            </div>
            <!-- header top menu end -->

            <!-- ============ end of header menu ============= -->
            @yield('content')

            <!-- Footer Start -->
            <div class="flex-grow-1"></div>
            <div class="app-footer">

                <div class="footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center justify-content-between ">

                    <p><strong>Application absence- LS Mohamed Ali Elhamma</strong></p>
                    <span class="flex-grow-1"></span>
                    <div class="d-flex align-items-center">
                        <img class="logo" src="{{asset('assets/images/logo.png')}}" alt="">
                        <div>
                            <p class="m-0">&copy; 2023 Naoufel Charfeddine</p>
                            <p class="m-0">Tous droits reservés</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fotter end -->
        </div>
        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->







    <!-- ============ Compact Layout End ============= -->











    <!-- ============ Horizontal Layout start ============= -->










    </div>
    </div>
    </div>
    <!-- ============ End Customizer ============= -->


    <script src="{{asset('assets/js/common-bundle-script.js')}}"></script>

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
    <script src="{{asset('assets/js/customizer.script.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/fonts/fontawesome-free-5.12.1-web/js/all.min.js')}}"></script>


    <!-- <script src="http://gull-html-laravel.ui-lib.com/assets/js/common-bundle-script.js"></script> -->




    <!-- <script src="http://gull-html-laravel.ui-lib.com/assets/js/script.js"></script> -->


    <!-- <script src="http://gull-html-laravel.ui-lib.com/assets/js/sidebar.compact.script.js"></script> -->





    <!-- <script src="http://gull-html-laravel.ui-lib.com/assets/js/customizer.script.js"></script> -->
    @yield('scripts')



</body>

</html>