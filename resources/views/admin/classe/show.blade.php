@extends('admin.layouts.master')
@section('title','Classes')
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
            <!-- <div class="dropdown">
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
                </div> -->
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
            <h1 class="mr-2">Dashboard</h1>
            <ul>
                <li><a href="">Classes</a></li>
                <!-- <li>Version 1</li> -->
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>
        <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body green-100">
                        <h3 class="card-title mb-3 heading text-primary text-center"> Classe: {{$classe->libeclassar }}</h3>

                        </div>
                    </div>
                </div>

        <div class="row mb-4">


        <div class="col-md-6 mb-3">
    <div class="card text-left">

        <div class="card-body">
            <h4 class="card-title mb-3"> Liste des élèves</h4>
            
            <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <thead class="thead-primary text-white teal-700 ">

                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Identifiant Unique</th>
                                        <th scope="col">Nom et Prénom</th>
                                        <th scope="col">Date de Naissance</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($eleves as $el)
                                    <tr>
                                        <th scope="row">{{$loop->iteration }}</th>
                                        <td><strong>{{$el->IdentifiantUnique}} </strong></td>
                                        <td><strong>{{$el->NomPrenom}}</strong></td>
                                        <td><strong>{{$el->DateNaissance}}</strong></td>


                                        
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>


        </div>
    </div>
</div>
<!-- end of col-->

<div class="col-md-6 mb-3">
    <div class="card text-left">

        <div class="card-body">
            <h4 class="card-title mb-3"> Liste des enseignants</h4>
            
            <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <thead class="thead-primary text-white teal-700">

                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"> Code Enseignant </th>
                                        <th scope="col">Nom et Prénom</th>
                                        <th scope="col">Matière</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($profs as $prof)
                                    <tr>
                                        <th scope="row">{{$loop->iteration }}</th>
                                        <td><strong>{{$prof->CodeEnseignant}} </strong></td>
                                        <td><strong>{{$prof->NomEnseignant}}</strong></td>
                                        <td><strong>{{$matieres[$prof->Matiere_id - 1]->NomMatiere}}</strong></td>


                                        
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
