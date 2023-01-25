@extends('admin.layouts.master')
@section('title','Matières')
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
                <li><a href="">Matières</a></li>
                <!-- <li>Version 1</li> -->
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>

        <div class="row mb-4">

            <div class="col-md-12 mb-3">
                <div class="card text-left">

                    <div class="card-body">
                        <div class="d-flex justify-content-between">

                            <h4 class="card-title mb-3"> Matières</h4>
                            <button type="button" class="btn btn-primary btn-icon m-1" data-toggle="modal" data-target="#verifyModalContent" data-whatever="@mdo">
                                <span class="ul-btn__icon"><i class="i-Add"></i></span>
                                <span class="ul-btn__text">Ajouter</span>
                            </button>
                        </div>

                        <p>
                            Vous pouvez créer, mettre à jour ou supprimer une matière.

                        </p>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="thead-dark">

                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Code Matière</th>
                                        <th scope="col">Nom Matière</th>


                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($matieres as $matiere)
                                    <tr>
                                        <th scope="row">{{$loop->iteration }}</th>
                                        <td><strong>{{$matiere->CodeMatiere}} </strong></td>
                                        <td>
                                            <strong>

                                                {{$matiere->NomMatiere}}
                                            </strong>

                                        </td>


                                        <td class="d-flex">
                                            <button class="btn text-success bg-transparent btn-icon  mr-2 editbtn" data-id="{{$matiere->id}}"  data-toggle="modal" data-target="#editModalContent" ><i class="nav-icon i-Pen-5 font-weight-bold"></i></button>

                                            <!-- <a href="#" class="text-success mr-2">
                                                    <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                </a> -->
                                            <form action="{{ route('matieres.destroy', $matiere->id)}}" method="post" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <!-- <a  class="text-danger mr-2" type="submit">
                                                    <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </a> -->
                                                <button class="btn text-danger  btn-icon  mr-2 alert-confirm"   ><i class="nav-icon i-Close-Window font-weight-bold"></i></i></button>

                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>


                    </div>
                    {!! $matieres->links() !!}
                </div>
            </div>
        </div>


        <!-- Verify Modal content -->
        <div class="modal fade" id="verifyModalContent" tabindex="-1" role="dialog" aria-labelledby="verifyModalContent" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verifyModalContent_title">Nouvelle Matière</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{route('matieres.store') }}">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="recipient-name-1" class="col-form-label"> Code Matière:</label>
                                <input type="text" class="form-control"  name="CodeMatiere">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name-2" class="col-form-label">Nom Matière:</label>
                                <input type="text" class="form-control"  name="NomMatiere">
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Modal content -->
        <div class="modal fade" id="editModalContent" tabindex="-1" role="dialog" aria-labelledby="editModalContent" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalContent_title">Modifier Matière</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form >
                        @csrf
                        @method('PUT')
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="recipient-name-1" class="col-form-label"> Code Matière:</label>
                                <input type="text" class="form-control" id="CodeMatiere" name="CodeMatiere">
                                <input type="hidden" class="form-control" id="IdMatiere" name="IdMatiere">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name-2" class="col-form-label">Nom Matière:</label>
                                <input type="text" class="form-control" id="NomMatiere" name="NomMatiere">
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="" class="btn btn-primary updatebtn">Enregistrer</button>
                        </div>
                    </form>
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
@section('scripts')
<script>
    $(document).ready(function() {
        $('.alert-confirm').on('click', function (e) {
        e.preventDefault();
        var form =  $(this).closest("form");
        swal({
            title: 'Êtes vous sûr?',
            text: "Cet action est irréversible!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0CC27E',
            cancelButtonColor: '#FF586B',
            confirmButtonText: 'Oui, Supprimer!',
            cancelButtonText: 'Non, Annuler!',
            confirmButtonClass: 'btn btn-success mr-5',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function () {
            form.submit();
            swal(
                'Supprimée!',
                'La matière a bien été supprimée.',
                'success'
            )
        }, function (dismiss) {
            // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            if (dismiss === 'cancel') {
                swal(
                    'Annulée',
                    'La supression est annulée !! :)',
                    'error'
                )
            }
        })
    });

    //edit button
    $('.editbtn').on('click', function (e) {
        e.preventDefault();
        let id=$(this).data('id');
      

        // var action ="{{URL::to('matieres')}}/"+id;


        // var url = "{{URL::to('matieres')}}";
        
        $.get("matieres/" + id + "/edit", function (data) {
                console.log(data.data);
                $('#CodeMatiere').val(data.data['CodeMatiere']);
            $('#NomMatiere').val(data.data['NomMatiere']);
            $('#IdMatiere').val(data.data['id']);

                

            });

        
       

    });
    $('.updatebtn').on('click', function (e) {
        e.preventDefault();
        var CodeMatiere = $('#CodeMatiere').val();
        var NomMatiere =  $('#NomMatiere').val();
        var id = $('#IdMatiere').val();
        
        $.ajax({
        method:"PUT",
        url: "matieres/"+id,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:{
          id:id,
          CodeMatiere:CodeMatiere,
          NomMatiere:NomMatiere,
         
        },
        success: function(data){
            $('.modal').modal('hide');
        // alert('update done')
   
    }});
});
});
</script>
@endsection