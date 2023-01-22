@extends('layouts.app')
@section('title','Login')
@section('content')
<div class="auth-layout-wrap" style="background-image: url({{asset('assets/images/bgauth.jpg')}})">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                <img src="assets/images/logo.png" alt="">
                            </div>
                            <h1 class="mb-3 text-18">S'identifier</h1>
                            <form method="POST" action="{{ route('login') }}">
                            @csrf    
                            <div class="form-group">
                                    <label for="email">Addresse Email </label>
                                    <input id="email" class="form-control  @error('email') is-invalid @enderror form-control-rounded" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Mot de passe</label>
                                    <input id="password" class="form-control @error('password') is-invalid @enderror form-control-rounded" type="password" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <button class="btn btn-rounded btn-primary btn-block mt-2" type="submit">Login</button>

                            </form>

                            <div class="mt-3 text-center">
                                <a href="forgot.html" class="text-muted"><u>Mot de passe oubliée?</u></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center " style="background-size: cover;background-image: url(./assets/images/photo-long-3.jpg)">
                        <!-- <div class="pr-3 auth-right">
                            <a class="btn btn-rounded btn-outline-primary btn-outline-email btn-block btn-icon-text" href="signup.html">
                                <i class="i-Mail-with-At-Sign"></i> Sign up with Email
                            </a>
                            <a class="btn btn-rounded btn-outline-google btn-block btn-icon-text">
                                <i class="i-Google-Plus"></i> Sign up with Google
                            </a>
                            <a class="btn btn-rounded btn-block btn-icon-text btn-outline-facebook">
                                <i class="i-Facebook-2"></i> Sign up with Facebook
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
            </div>
            </div>
@endsection