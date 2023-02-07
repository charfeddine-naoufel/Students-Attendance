@extends('prof.layouts.master')
@section('title','Mes Classes')
@section('customstyle')
<style>
    .card {
        background-color: #fff;
        border-radius: 10px;
        border: none;
        position: relative;
        margin-bottom: 30px;
        box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
    }


    .l-bg-blue-dark {
        background: linear-gradient(to right, #373b44, #4286f4) !important;
        color: #fff;
    }



    /* .card .card-statistic-3 .card-icon-large .fas, .card .card-statistic-3 .card-icon-large .far, .card .card-statistic-3 .card-icon-large .fab, .card .card-statistic-3 .card-icon-large .fal {
    font-size: 110px;
} */

    .card .card-statistic-3 .card-icon {
        text-align: center;
        line-height: 50px;
        margin-left: 15px;
        color: #000;
        position: absolute;
        right: 0px;
        top: 20px;
        opacity: 0.1;
    }

    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }
</style>
@endsection
@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1>Séance</h1>
        <ul>
            <li><a href="">Absence</a></li>
        </ul>

    </div>

    <div class="separator-breadcrumb border-top"></div>
    <form method="post" action="{{route('seance.store_absence') }}">
                        @csrf
    <div class="row mb-5">
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-body ">
                    <div class="card-title mb-0">Liste des élèves <button type="button" class="btn btn-dark btn-sm m-1 clear">Clear</button></div>

                    <div class="table-responsive ">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" style="width:5%">N°</th>
                                    <th scope="col" style="width:55%">Nom</th>
                                    <th scope="col" style="width:20%">Abs</th>
                                    <th scope="col" style="width:20%">Ex</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($classe->eleves as $el)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td style="text-align:center;font-family: 'Noto Naskh Arabic', serif;font-size: 15px;">{{$el->NomPrenom}}</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="checkbox" name="absents[]" value="{{$el->id}}" type="checkbox" id="flexCheckDefault">

                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-check">
                                            <input class="checkbox" name="exclus[]" value="{{$el->id}}" type="checkbox" id="flexCheckDefault">

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
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputtext14" class="ul-form__label">Classe:</label>
                                    <input type="text" class="form-control" id="inputtext15" readonly value="{{$classe->libeclassar}}">
                                    <input type="hidden" class="form-control" id="inputtext16" name="classe_IdClasse" value="{{$classe->IdClasse}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleFormControlSelect1" class="ul-form__label">Matiere</label>
                                    <select class="form-control" id="Matiere_id" name="matiere_id">
                                        <option value="0">Choisir ...</option>
                                        @foreach($matieres as $matiere)
                                        <option value="{{$matiere->id}}">{{$matiere->NomMatiere}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleFormControlTextarea1">Commentaires</label>
                                    <textarea class="form-control w-100" id="exampleFormControlTextarea1" rows="3" name="commentaires"></textarea>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="row text-right">
                        <div class="col-lg-12 ">
                            <button type="submit" class="btn btn-success m-1">
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
@endsection
@section('scripts')
<script>
    $(document).ready(function() {

        $('.clear').on('click', function() {

            $('.checkbox').each(function() {
                this.checked = false;
            });


        });



    });
</script>
@endsection