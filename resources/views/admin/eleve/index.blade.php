@extends('admin.layouts.master')
@section('title','Enseignants')
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
                <li><a href="">Enseignants</a></li>
                <!-- <li>Version 1</li> -->
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>

        <div class="row mb-4">

            <div class="col-md-12 mb-3">
                <div class="card text-left">

                    <div class="card-body">
                        <div class="d-flex justify-content-between">

                            <h4 class="card-title mb-3"> Elèves</h4>
                            <button type="button" class="btn btn-primary btn-icon m-1 ajout_el" data-toggle="modal" data-target="#new_e">
                                <span class="ul-btn__icon"><i class="i-Add"></i></span>
                                <span class="ul-btn__text ">Ajouter</span>
                            </button>
                        </div>

                        <p>
                            Vous pouvez créer, mettre à jour ou supprimer un élève.

                        </p>
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <thead class="thead-dark">

                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Identifiant</th>
                                        <th scope="col">Nom et Prenom</th>
                                        <th scope="col">Nom Père</th>
                                        <th scope="col">Tél Père</th>
                                        <th scope="col">Classe</th>


                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($eleves as $eleve)
                                    <tr>
                                        <th scope="row">{{$loop->iteration }}</th>
                                        <td><strong>{{$eleve->IdentifiantUnique}} </strong></td>
                                        <td>
                                            <strong>

                                                {{$eleve->NomPrenom}}
                                            </strong>

                                        </td>
                                        <td>
                                            <strong>

                                                {{$eleve->NomPere}}
                                            </strong>

                                        </td>
                                        <td>
                                            <strong>

                                                {{$eleve->GSMPere}}
                                            </strong>

                                        </td>
                                        <td>
                                            <strong>

                                                {{$eleve->libeclassar}}
                                            </strong>

                                        </td>


                                        <td class="d-flex">
                                            <button class="btn text-success bg-transparent btn-icon  mr-2 editbtn" data-id="{{$eleve->id}}" data-toggle="modal" data-target="#editModalContent"><i class="nav-icon i-Pen-5 font-weight-bold"></i></button>

                                            <!-- <a href="#" class="text-success mr-2">
                                                    <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                </a> -->
                                            <form action="{{ route('eleves.destroy', $eleve->id)}}" method="post" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <!-- <a  class="text-danger mr-2" type="submit">
                                                    <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </a> -->
                                                <button id="alert-confirm" class="btn text-danger  btn-icon  mr-2 "><i class="nav-icon i-Close-Window font-weight-bold"></i></i></button>

                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>


                    </div>
                    {!! $eleves->links() !!}
                </div>
            </div>
        </div>


        <!-- Verify Modal content -->
        <div class="modal fade" id="new_e" tabindex="-1" role="dialog" aria-labelledby="verifyModalContent" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="new">Nouveau eleve</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{route('eleves.store') }}">
                        @csrf
                        <div class="modal-body">

                        <div class="form-row">    
                        <div class="form-group col-md-6">
                                <label for="cin" class="col-form-label"> CIN:</label>
                                <input type="text" class="form-control" name="CIN">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="recipient-name-1" class="col-form-label"> Identifiant:</label>
                                <input type="text" class="form-control" name="IdentifiantUnique">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="NomPrenom" class="col-form-label">Nom Prenom:</label>
                                <input type="text" class="form-control" name="NomPrenom">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="DateNaissance" class="col-form-label">Date de naissance:</label>
                                <input type="date" class="form-control" name="DateNaissance">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Adresse" class="col-form-label">Adresse:</label>
                                <input type="text" id="adr" class="  form-control" name="Adresse" value="الحامة">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="GSMPere" class="col-form-label">GSM Pere:</label>
                                <input type="text" class="form-control" name="GSMPere">
                            </div>
                           
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                                <label for="NomPere" class="col-form-label">Nom Pere:</label>
                                <input type="text" class="form-control" name="NomPere">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="NomMere" class="col-form-label">Nom Mere:</label>
                                <input type="text" id="mere"class=" form-control" name="NomMere" value="--">
                            </div>
                            
                        </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Classe :</label>
                                <select class="form-control" id="Classe_id" name="Classe_id">
                                    <option value="0">Choisir ...</option>
                                    @foreach($classes as $classe)
                                    <option value="{{$classe->IdClasse}}">{{$classe->libeclassar}}</option>
                                    @endforeach

                                </select>
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
                        <h5 class="modal-title" id="editModalContent_title">Modifier eleve</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="">
                        @csrf
                        <div class="modal-body">

                        <div class="form-row">    
                        <div class="form-group col-md-6">
                                <label for="cin" class="col-form-label"> CIN:</label>
                                <input type="text" class="form-control" id="CIN">
                                <input type="hidden" class="form-control" id="Ideleve">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="recipient-name-1" class="col-form-label"> Identifiant:</label>
                                <input type="text" class="form-control" id="IdentifiantUnique">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="NomPrenom" class="col-form-label">Nom Prenom:</label>
                                <input type="text" class="form-control" id="NomPrenom">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="DateNaissance" class="col-form-label">Date de naissance:</label>
                                <input type="date" class="form-control" id="DateNaissance">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Adresse" class="col-form-label">Adresse:</label>
                                <input type="text" class=" adr form-control" id="Adresse" value='الحامة'>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="GSMPere" class="col-form-label">GSM Pere:</label>
                                <input type="text" class="form-control" id="GSMPere">
                            </div>
                           
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                                <label for="NomPere" class="col-form-label">Nom Pere:</label>
                                <input type="text" class="form-control" id="NomPere">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="NomMere" class="col-form-label">Nom Mere:</label>
                                <input type="text" class="mere form-control" id="NomMere" value="--">
                            </div>
                            
                        </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Classe :</label>
                                <select class="form-control" id="Classe_id" id="Classe_id">
                                    <option value="0">Choisir ...</option>
                                    @foreach($classes as $classe)
                                    <option value="{{$classe->IdClasse}}">{{$classe->libeclassar}}</option>
                                    @endforeach

                                </select>
                            </div>
                            


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button  class="btn btn-primary updatebtn ">Enregistrer</button>
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
        $('.ajout_el').on('click', function(e) {
            e.preventDefault();
        
        $('#adr').val('  الحامة');
        $('#mere').val('--------');
        });
        $('#alert-confirm').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest("form");
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
            }).then(function() {
                form.submit();
                swal(
                    'Supprimée!',
                    'L eleve a bien été supprimée.',
                    'success'
                )
            }, function(dismiss) {
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
        $('.editbtn').on('click', function(e) {
            e.preventDefault();
            let id = $(this).data('id');


            // var action ="{{URL::to('enseignants')}}/"+id;


            // var url = "{{URL::to('enseignants')}}";

            $.get("eleves/" + id + "/edit", function(data) {
                console.log(data.data);
                $('#CIN').val(data.data['CIN']);
                $('#IdentifiantUnique').val(data.data['IdentifiantUnique']);
                $('#NomPrenom').val(data.data['NomPrenom']);
                $('#DateNaissance').val(data.data['DateNaissance']);
                $('#Adresse').val(data.data['Adresse']);
                $('#NomPere').val(data.data['NomPere']);
                $('#NomMere').val(data.data['NomMere']);
                $('#GSMPere').val(data.data['GSMPere']);
                $('#Classe_id').val(data.data['Classe_id']);
                $('#Ideleve').val(data.data['id']);



            });




        });
        $('.updatebtn').on('click', function(e) {
            e.preventDefault();
            var identite = $('#CIN').val();
            var IdentifiantUnique = $('#IdentifiantUnique').val();
            var NomPrenom = $('#NomPrenom').val();
            var DateNaissance = $('#DateNaissance').val();
            var Adresse = $('#Adresse').val();
            var NomPere = $('#NomPere').val();
            var NomMere = $('#NomMere').val();
            var GSMPere = $('#GSMPere').val();
            var Classe_id = $('#Classe_id').val();
            var id = $('#Ideleve').val();

            $.ajax({
                method: "PUT",
                url: "eleves/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                    CIN: identite,
                    IdentifiantUnique: IdentifiantUnique,
                    NomPrenom: NomPrenom,
                    Adresse: Adresse,
                    DateNaissance: DateNaissance,
                    NomPere: NomPere,
                    NomMere: NomMere,
                    GSMPere: GSMPere,
                    Classe_id: Classe_id,

                },
                success: function(data) {
                    $('.modal').modal('hide');
                    // alert('update done')

                }
            });
        });
    });
</script>
@endsection