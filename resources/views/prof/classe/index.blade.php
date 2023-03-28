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
        <h1>Enseignant</h1>
        <ul>
            <li><a href="">Mes Classes</a></li>
        </ul>

    </div>

    <div class="separator-breadcrumb border-top"></div>

    <div class="row mb-5">
        <!-- <div class="col-md-12">
                    <h2 class="card-title mb-4">Mes Classes</h2>
                </div> -->
        <div class="row mb-5 d-flex w-100 justify-content-around">


            
            
            @foreach($eleves as $key => $eleve)
            @if (!empty($eleve))
            <!-- card start -->
            <div class="col-xl-4 col-lg-6">
                <div class="card l-bg-blue-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large">
                            <i class=" fas fa-user-friends" style="font-size: 80px !important;"></i>
                        </div>
                        <div class="mb-4">
                            <h3 class="card-title mb-0 text-white text-center" style="font-family: 'Cairo', sans-serif;font-size: 30px;font-weight:400;">{{$classes[$loop->iteration-1]->libeclassar}}</h3>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-6">
                                <h4 class="d-flex align-items-center mb-0">
                                    Total:{{count($eleve)}}
                                </h4>
                            </div>
                            <div class="col-6 text-right">
                                <span>Absent:2 </span>
                            </div>
                        </div>

                    </div>
                    <div class="card-body bg-white mt-0 p-0 shadow">
                        <div class="table-responsive ">
                            <table class="table table-striped table-dark table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nom et Prenom</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($eleve as $el)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td style="font-family: 'Cairo', sans-serif;font-size: 20px;">{{$el->NomPrenom}}</td>

                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>

                        <a href="{{route('seance.absence',$key)}}" class="btn btn-lg btn-block  btn-primary ">Faire l'appel</a>
                    </div>
                </div>
            </div>
            <!-- card end -->
            @endif

            @endforeach
            
        </div>

        <!-- end of col -->


    </div>
</div>
@endsection