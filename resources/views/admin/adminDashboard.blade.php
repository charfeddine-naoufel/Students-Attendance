@extends('admin.layouts.master')
@section('title','Admin Dashboard')
@section('content')
<div class="app-admin-wrap layout-sidebar-large clearfix">
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
            <!-- Mega menu -->

            <!-- / Mega menu -->
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
            <div class="dropdown">
                <i class="i-Safe-Box text-muted header-icon" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false"></i>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="menu-icon-grid">
                        <a href="#"><i class="i-Shop-4"></i> Home</a>
                        <a href="#"><i class="i-Library"></i> UI Kits</a>
                        <a href="#"><i class="i-Drop"></i> Apps</a>
                        <a href="#"><i class="i-File-Clipboard-File--Text"></i> Forms</a>
                        <a href="#"><i class="i-Checked-User"></i> Sessions</a>
                        <a href="#"><i class="i-Ambulance"></i> Support</a>
                    </div>
                </div>
            </div>
            <!-- Notificaiton -->
            <div class="dropdown">
                <div class="badge-top-container" id="dropdownNotification" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="badge badge-primary">3</span>
                    <i class="i-Bell text-muted header-icon"></i>
                </div>
                <!-- Notification dropdown -->

            </div>
            <!-- Notificaiton End -->

            <!-- User avatar dropdown -->
            <div class="dropdown">
                <div class="user col align-self-end">
                    <img src="{{asset('assets/images/faces/1.jpg')}}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

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

    @include('admin.layouts.menu')
    <!--=============== Left side End ================-->

    <!-- ============ Body content start ============= -->
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="breadcrumb">
            <h1 class="mr-2">Version 1</h1>
            <ul>
                <li><a href="">Dashboard</a></li>
                <li>Version 1</li>
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>
        

        <div class="row">
            <!-- ICON BG -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                    <div class="card-body text-center">
                        <i class="i-Add-User"></i>
                        <div class="content">
                            <p class="text-muted mt-2 mb-0">Absence</p>
                            <p class="text-primary text-24 line-height-1 mb-2">20</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                    <div class="card-body text-center">
                        <i class="i-File-Clipboard"></i>
                        <div class="content">
                            <p class="text-muted mt-2 mb-0">Classes</p>
                            <p class="text-primary text-24 line-height-1 mb-2">21</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                    <div class="card-body text-center">
                        <i class="i-Checkout-Basket"></i>
                        <div class="content">
                            <p class="text-muted mt-2 mb-0">prof</p>
                            <p class="text-primary text-24 line-height-1 mb-2">40</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                    <div class="card-body text-center">
                        <i class="i-Money-2"></i>
                        <div class="content">
                            <p class="text-muted mt-2 mb-0">Matiers</p>
                            <p class="text-primary text-24 line-height-1 mb-2">20</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mb-4">


<div class="col-md-12 mb-3">
    <div class="card text-left">

        <div class="card-body">
            <h4 class="card-title mb-3">Absences</h4>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Classe</th>
                            <th scope="col">Enseignant</th>
                            <th scope="col">Matiere</th>
                            <th scope="col">Date</th>
                            <th scope="col">Horaire</th>
                            <th scope="col">Absents</th>
                            <th scope="col">Exclus</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($absences as $absence)

                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$cls[$absence->classe_IdClasse]}}</td>
                            <td>{{$profs[$absence->enseignant_id]}}</td>
                            <td>{{$mats[$absence->matiere_id]}}</td>
                            <td>{{$absence->date}} </td>

                            <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$absence->debut)->format('h:i')}} - {{\Carbon\Carbon::createFromFormat('H:i:s',$absence->fin)->format('h:i')}} </td>
                            <td><a href="{{'#collapse-icon'.$loop->iteration}}" class="text-default collapsed" data-toggle="collapse" aria-expanded="false">
                                    <i class="i-Arrow-Down-2 t-font-boldest"></i>
                                </a>

                                <div class="collapse" id="{{'collapse-icon'.$loop->iteration}}">
                                    <div class="mt-3">
                                        @foreach($absence->absents as $absent)
                                        <p style="font-family: 'Cairo', sans-serif;font-size: 13px;">{{$abs[$absent]}}</p>
                                        @endforeach
                                    </div>
                                </div>


                            </td>
                            <td><a href="{{'#collapse-icon'.'-'.$loop->iteration}}" class="text-default collapsed" data-toggle="collapse" aria-expanded="false">
                                    <i class="i-Arrow-Down-2 t-font-boldest"></i>
                                </a>

                                <div class="collapse" id="{{'collapse-icon'.'-'.$loop->iteration}}">
                                    <div class="mt-3">
                                        @foreach($absence->exclus as $exclu)
                                        <p style="font-family: 'Cairo', sans-serif;font-size: 13px;">{{$abs[$exclu]}}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </td>


                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>

<!-- end of col-->

</div>
<div class="separator-breadcrumb border-top"></div>
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title">Absence Annuelle</div>
                        <div id="echartBar" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title">Absence par classe</div>
                        <div id="echartPie" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Footer Start -->
        <div class="flex-grow-1"></div>
        <div class="app-footer">

            <div class="footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center justify-content-between ">

                <p><strong>Application absence- LS Mohamed Ali Elhamma</strong></p>
                <span class="flex-grow-1"></span>
                <div class="d-flex align-items-center">
                    <img class="logo" src="./assets/images/logo.png" alt="">
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
@endsection