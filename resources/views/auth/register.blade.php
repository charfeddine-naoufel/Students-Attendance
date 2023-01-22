@extends('layouts.app')
@section('title','Register')
@section('content')
<div class="auth-layout-wrap" style="background-image: url({{asset('assets/images/bgauth.jpg')}})">
    <div class="auth-content">
        <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-6 text-center " style="background-size: cover;background-image: url({{asset('assets/images/photo-long-3.jpg')}})">
                        
                    </div>

                    <div class="col-md-6">
                        <div class="p-4">

                            <h1 class="mb-3 text-18">S'identifier'</h1>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="username">Votre nom</label>
                                    <input id="username" class="form-control @error('name') is-invalid @enderror form-control-rounded" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Adresse Email</label>
                                    <input id="email" class="form-control form-control-rounded @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Mot de passe</label>
                                    <input id="password" class="form-control form-control-rounded @error('password') is-invalid @enderror"" type="password" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="repassword">Confirmer Mot de passe</label>
                                    <input id="repassword" class="form-control form-control-rounded " type="password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block btn-rounded mt-3">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
@endsection