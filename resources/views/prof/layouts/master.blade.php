<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="qM3C6SQ9HgjfYwXu6u6HkXL3jS69eJTjaidMTZmA">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@500&family=Cairo:wght@400;500&family=Noto+Naskh+Arabic:wght@600&display=swap" rel="stylesheet">

    <link  rel="stylesheet" href="{{asset('assets/fonts/fontawesome-free-5.12.1-web/css/all.css')}}">
    <!-- <link  rel="stylesheet" href="http://gull-html-laravel.ui-lib.com/assets/styles/css/themes/lite-purple.min.css"> -->

    <link  rel="stylesheet" href="{{asset('assets/styles/css/themes/lite-purple.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/perfect-scrollbar.css')}}"> 
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/styles/css/select2.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/metisMenu.min.css')}}"> 

    @yield('customstyle')

</head>


<body class="text-left">

    <!-- Pre Loader Strat  -->
    <div class='loadscreen' id="preloader">

        <div class="loader spinner-bubble spinner-bubble-primary">


        </div>
    </div>
    <!-- Pre Loader end  -->







    <!-- ============ Compact Layout start ============= -->


    <div class="app-admin-wrap layout-sidebar-vertical sidebar-full">
        <!-- start sidebar -->
        <div class="sidebar-panel">
            <div class="gull-brand pr-3 text-center mt-4 mb-2 d-flex justify-content-center align-items-center">
                <img class="pl-3" src="{{asset('assets/images/logo.png')}}" alt="">
                <span class=" item-name text-20 text-primary font-weight-700">LS Med Ali</span>
                <!-- <div class="sidebar-compact-switch ml-auto"><span></span></div> -->

            </div>
            <!-- user -->
            <div class="separator-breadcrumb border-top"></div>
            <div class="scroll-nav" data-perfect-scrollbar data-suppress-scroll-x="true">

                <!-- user close -->
                <!-- side-nav start -->
                <div class="side-nav">

                    <div class="main-menu">

                        <!-- <ul>
                            <li>
                                <a href="*" class="active-color">
                                    <span class="item-name ">Dashboard</span>
                                    <span class="spacer"></span>
                                    <span class="item-badge badge badge-warning">100+</span>
                                </a>
                            </li>
                            
                        </ul> -->
                        <ul class="metismenu" id="menu">
                            <!-- <p class="main-menu-title text-muted ml-3 font-weight-700 text-13 mt-4 mb-2">Apps</p> -->
                            <li class="Ul_li--hover">
                                <a class="has-arrow" href="{{route('prof.home')}}">
                                    <i class="i-Bar-Chart text-20 mr-2 text-muted"></i>
                                    <span class="item-name  text-muted">Dashboard</span>
                                </a>

                            </li>
                            <li class="Ul_li--hover">
                                <a class="has-arrow" href="#">
                                    <i class="i-Library text-20 mr-2 text-muted"></i>

                                    <span class="item-name  text-muted">Classes</span>
                                </a>
                                <ul class="mm-collapse">
                                    <li class="item-name">
                                        <a href="{{route('prof.mesclasses')}}">
                                            <i class="nav-icon i-Bell1"></i>
                                            <span class="item-name">Mes classes</span>
                                        </a>
                                    </li>
                                    <li class="item-name">
                                    <li class="nav-item">
                                        <a href="#">
                                            <i class="nav-icon i-Bell1"></i>
                                            <span class="item-name">Mes élèves</span>
                                        </a>
                                    </li>
                            </li>


                        </ul>
                        </li>
                        <li class="Ul_li--hover">
                    <a class="has-arrow">
                        <i class="i-Double-Tap text-20 mr-2 text-muted"></i>
                        <span class="item-name  text-muted">Outils</span>
                    </a>
                    <ul class="mm-collapse">
                        <li class="item-name">
                            <a href="#">
                                <i class="nav-icon i-Calendar"></i>
                                <span class="item-name">Calendrier Dev</span>
                            </a>
                        </li>
                        <li class="item-name">
                            <a href="#">
                                <i class="nav-icon i-Email"></i>
                                <span class="item-name">SMS Parent</span>
                            </a>
                        </li>
                        

                    </ul>
                </li>


                        </ul>
                    </div>
                </div>
            </div>

            <!-- side-nav-close -->
        </div>
        <!-- end sidebar -->
        <!-- <div class="switch-overlay"></div> -->
        <div class="main-content-wrap  mobile-menu-content bg-off-white m-0">
            <!-- header start -->
            <header class=" main-header bg-white d-flex justify-content-between p-2">
                <div class="header-toggle">
                    <div class="menu-toggle mobile-menu-icon">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>

                    <i class="i-Add-UserStar mr-3 text-20 cursor-pointer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Todo"></i>
                    <i class="i-Speach-Bubble-3 mr-3 text-20 cursor-pointer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Chat"></i>
                    <i class="i-Email mr-3 text-20 mobile-hide cursor-pointer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Inbox"></i>
                    <i class="i-Calendar-4 mr-3 mobile-hide text-20 cursor-pointer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Calendar"></i>
                    <i class="i-Checkout-Basket mobile-hide mr-3 text-20 cursor-pointer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Calendar"></i>

                </div>
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
            </header>
            <!-- header close -->
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

        <div class="sidebar-overlay open"></div>
    </div>




    <!-- ============ Vetical SIdebar Layout End ============= -->












    <!-- ============ Large SIdebar Layout start ============= -->




    <script src="{{asset('assets/js/common-bundle-script.js')}}"></script>

    <script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
    ph<script src="{{asset('assets/js/es5/echart.options.js')}}"></script>
    <script src="{{asset('assets/js/es5/dashboard.v1.script.js')}}"></script>




    <script src="{{asset('assets/js/script.js')}}"></script>





    <script src="{{asset('assets/js/tooltip.script.js')}}"></script>
    <!-- <script src="{{asset('assets/js/script_2.js')}}"></script> -->
    <script src="http://gull-html-laravel.ui-lib.com/assets/js/es5/script_2.js"></script>
    <script src="{{asset('assets/js/vendor/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/js/layout-sidebar-vertical.js')}}"></script>





    <script src="{{asset('assets/js/customizer.script.js')}}"></script>
    <script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert.script.js')}}"></script>
    <!-- <script src="{{asset('assets/fonts/fontawesome-free-5.12.1-web/js/all.js')}}"></script> -->
    <!-- <script type="text/javascript" src="addon/fonction/fonction.js"></script> -->

    @yield('scripts')

</body>

</html>