@extends('prof.layouts.master')
@section('title','Absences')
@section('customstyle')
<style>

</style>
@endsection
@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1>Home</h1>
        <ul>
            <li><a href="">Enseignant</a></li>
        </ul>

    </div>

    <div class="separator-breadcrumb border-top"></div>

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
                                    <th scope="col">Date</th>
                                    <th scope="col">Horaire</th>
                                    <th scope="col">Absents</th>
                                    <th scope="col">Exclus</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($absences as $absence)

                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$cls[$absence->classe_IdClasse]}}</td>
                                    <td>{{$absence->date}} </td>

                                    <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$absence->debut)->format('h:i')}} - {{\Carbon\Carbon::createFromFormat('H:i:s',$absence->fin)->format('h:i')}} </td>
                                    <td><a href="{{'#collapse-icon'.$loop->iteration}}" class="text-default collapsed" data-toggle="collapse" aria-expanded="false">
                                            <i class="i-Arrow-Down-2 t-font-boldest"></i>
                                        </a>

                                        <div class="collapse" id="{{'collapse-icon'.$loop->iteration}}">
                                            <div class="mt-3">
                                                <ul class="list-group">
                                                    @forelse ($absence->absents as $absent)

                                                    <li class="list-group-item p-1 w-80" style="font-family: 'Cairo', sans-serif;font-size: 10px;">{{$abs[$absent]}}</li>

                                                    @empty

                                                    <p class="bg-danger text-white p-1">Aucun Exclu</p>

                                                    @endforelse

                                                </ul>

                                            </div>
                                        </div>


                                    </td>
                                    <td><a href="{{'#collapse-icon'.'-'.$loop->iteration}}" class="text-default collapsed" data-toggle="collapse" aria-expanded="false">
                                            <i class="i-Arrow-Down-2 t-font-boldest"></i>
                                        </a>

                                        <div class="collapse" id="{{'collapse-icon'.'-'.$loop->iteration}}">
                                            <div class="mt-3">
                                                <ul class="list-group">
                                                    @forelse ($absence->exclus as $exclu)

                                                    <li class="list-group-item p-1 w-80" style="font-family: 'Cairo', sans-serif;font-size: 10px;">{{$abs[$exclu]}}</li>

                                                    @empty

                                                    <p class="bg-danger text-white p-1">Aucun Exclu</p>

                                                    @endforelse

                                                </ul>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <a href=""><i class="i-Pen-5 text-19 text-success font-weight-700 editbtn" data-id="{{$absence->id}} " data-toggle="modal" data-target=".bd-example-modal-xl"></i></a>

                                        <a href=""><i class="i-Close-Window text-19 text-danger font-weight-700"></i></a>
                                        <!-- <button type="button" class="btn btn-success ">
                                <i class="nav-icon i-Pen-2 "></i>
                            </button> -->
                                        <!-- <button type="button" class="btn btn-danger ">
                                <i class="nav-icon i-Close-Window "></i>
                            </button> -->
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>Aucune absence</td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>

        <!-- end of col-->
        <!-- Large Modal -->
        <div class="modal fade bd-example-modal-xl " tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width:900px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="separator-breadcrumb border-top"></div>
                        <form method="post" action="">
                            @csrf
                            <div class="row mb-5">
                                <div class="col-lg-4 mb-4">
                                    <div class="card">
                                        <div class="card-body ">
                                            <div class="card-title mb-0">Liste des élèves <button type="button" class="btn btn-dark btn-sm m-1 clear">Clear</button></div>

                                            <div class="table-responsive ">
                                                <table class="table table-sm table-bordered" id="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width:5%">N°</th>
                                                            <th scope="col" style="width:75%">Nom</th>
                                                            <th scope="col" style="width:10%">Abs</th>
                                                            <th scope="col" style="width:10%">Ex</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- <tr>
                                        <th scope="row">1</th>
                                        <td style="text-align:center;font-family: 'Noto Naskh Arabic', serif;font-size: 15px;">hhhh</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="checkbox" name="absents[]" value="" type="checkbox" id="flexCheckDefault">

                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-check">
                                                <input class="checkbox" name="exclus[]" value="" type="checkbox" id="flexCheckDefault">

                                            </div>
                                        </td>
                                    </tr> -->


                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="">
                                                <div class="card-body">
                                                    <div class="card-title">Séance Info:</div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="inputtext14" class="ul-form__label">Date:</label>
                                                            <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}">
                                                            <input type="hidden" class="form-control" id="seanceid" name="id">

                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputEmail15" class="ul-form__label">Début:</label>
                                                            <input type="time" class="form-control" id="debut" name="debut">

                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="inputEmail16" class="ul-form__label">Fin:</label>
                                                            <input type="time" class="form-control" id="fin" name="fin">

                                                        </div>
                                                    </div>
                                                    <div class="custom-separator"></div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="inputtext14" class="ul-form__label">Enseignant:</label>
                                                            <input type="text" class="form-control" id="inputtext14" readonly value="{{ Auth::user()->name}}">
                                                            <input type="hidden" class="form-control" id="enseignantid">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputtext14" class="ul-form__label">Classe:</label>
                                                            <input type="text" class="form-control" id="classe" readonly value="">
                                                            <input type="hidden" class="form-control" id="classeid" name="classe_IdClasse" value="">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="exampleFormControlSelect1" class="ul-form__label">Matiere</label>
                                                            <select class="form-control" id="matieres" name="matiere_id">


                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="exampleFormControlTextarea1">Commentaires</label>
                                                            <textarea class="form-control w-100" id="commentaires" rows="3" name="commentaires"></textarea>
                                                        </div>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row text-right">
                                                <div class="col-lg-12 ">
                                                    <button class="btn btn-success m-1 btnup">
                                                        Enregistrer
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>




                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $(".editbtn").click(function(event) {
            event.preventDefault();
            var id = $(this).data("id");
            $.get("seances/" + id + "/edit", function(data) {
                console.log(data);
                var i = 1;
                data.eleves.forEach(function(row) {
                    console.warn(row)
                    var html = "<tr><td>" + i + "</td><td>" + row.NomPrenom + '</td><td><div class="form-check"><input class="checkbox" name="absents[]" value="" type="checkbox" id="flexCheckDefault"></div></td><td>' +
                        '<div class="form-check"><input class="checkbox" name="exclus[]" value="" type="checkbox" id="flexCheckDefault"></div></td></tr>'
                    $("#table").find('tbody').append(html);
                    i++;
                });
                $('#date').val(data.data['date']);
                $('#debut').val(data.data['debut']);
                $('#fin').val(data.data['fin']);
                $('#classe').val(data.classe['libeclassar']);
                $('#classeid').val(data.classe['IdClasse']);
                $('#enseignantid').val(data.classe['enseignant_id']);
                $('#matiereid').val(data.classe['matiere_id']);
                $('#commentaires').val(data.data['commentaire']);
                var matieres = $("#matieres");

                $(data.matieres).each(function() {
                    var option = $("<option>");
                    option.html(this.NomMatiere);
                    option.val(this.id);
                    matieres.append(option);
                });
                matieres.val(data.matiere.id)
                // $('#NomMatiere').val(data.data['NomMatiere']);
                // $('#IdMatiere').val(data.data['id']);



            });

        });
        //////////
        $(".btnup").click(function(event) {
            event.preventDefault();
            var id = $('#seanceid').val();
            var date = $('#date').val();
            var debut = $('#debut').val();
            var fin = $('#fin').val();
            var classe_IdClasse = $('#classeid').val();
            var enseignant_id = $('#enseignantid').val();
            var matiere_id = $('#matiereid').val();
            var commentaire = $('#commentaires').val();
            var absents = [];
            var exclus = [];
            $.ajax({
                method: "PUT",
                url: "seances/" + id+ "/update",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                    date: date,
                    NomEnseignant: NomEnseignant,
                    debut:debut,
                    fin:fin,
                    classe_IdClasse: classe_IdClasse,
                    enseignant_id: enseignant_id,
                    matiere_id: matiere_id,
                    commentaire: commentaire,
                    absents: absents,
                    exclus: exclus,

                },
                success: function(data) {
                    $('.modal').modal('hide');
                    // alert('update done')

                },error:function(data){
                    // console.log(data)
                }
            });

        });
    });
</script>
@endsection