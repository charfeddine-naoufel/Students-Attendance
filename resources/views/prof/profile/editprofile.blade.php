@extends('prof.layouts.master')
@section('title','Profile')
@section('customstyle')
<style>
.h-cover{
    background-image: url('{{asset("assets/images/photo-wide-4.jpg")}}')
}
</style>

@endsection
@section('content')

 <!--=============== Left side End ================-->
        <!-- ============ Body content start ============= -->
        <div class="main-content sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Profile Utilisateur</h1>
                <ul>
                    
                    <li>{{$user->name}}</li>
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <div class="card user-profile o-hidden mb-4">
                <div class="header-cover h-cover" style=""></div>
                <div class="user-info">
                    <img class="profile-picture avatar-lg mb-2" src="{{asset('assets/images/faces/1.jpg')}}" alt="">
                    <p class="m-0 text-24">{{$user->name}}</p>
                    <p class="text-muted m-0">استاد </p>
                </div>
                <div class="card-body d-flex justify-content-center">
                    
                <div class="col-md-6">
                        <div class="p-4">

                            <h1 class="mb-3 text-18">Votre Profile</h1>
                            <form method="POST"action="{{ route('user.update',Auth()->user()->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="username">Votre nom</label>
                                    <input id="name" name="name" class="form-control form-control-rounded" type="text" value="{{$user->name}} ">
                                    <input id="role" name="role" class="form-control form-control-rounded" type="hidden" value="prof">
                                </div>
                                <div class="form-group">
                                    <label for="email">Votre Addresse Email </label>
                                    <input id="email"name="email" class="form-control form-control-rounded" type="email" value="{{$user->email}} ">
                                </div>
                                <div class="form-group">
                                    <label for="password">Nouveau Mot de passe</label>
                                    <input id="password" name="password"class="form-control form-control-rounded" type="password">
                                </div>
                                <div class="form-group">
                                    <label for="repassword">Confirmer Mot de passe</label>
                                    <input id="repassword" name="password_confirmation" class="form-control form-control-rounded" type="password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block btn-rounded mt-3">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
@endsection