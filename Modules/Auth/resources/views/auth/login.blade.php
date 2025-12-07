<style>
    body{
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                          url('images/bg-login.jpg');
        background-repeat: no-repeat;
        background-size: cover;  
        background-position: center center;  
        height: 100vh;  
        margin: 0; 
        font-family: 'Outfit', sans-serif !important;
        font-optical-sizing: auto;
    }
    .copyright {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        text-align: center;
        padding: 8px 0;
        font-size: 0.8rem;
        z-index: 1000; 
    }

    @keyframes scrollLeft {
        0% {
            left: 100%; 
        }
        100% {
            left: -100%; 
        }
    }

    



</style>

@extends('auth::layouts.applogin')
 
@section('content')
<div class="container">
    <center>
        <h5 class="text-light p-0 m-0">Sistem HMVC Laravel 10</h5>
    </center>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-5 mt-2">
            <div class="card mt-3" style="border-radius:0; border-color:#0DA86B">
                <div class="card-header p-2 m-0" style="border-radius:0; border-bottom:2px solid #b20000; background-color:#7f0000;">
                    <center><img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="width:100; height:100; border-radius:50px 50px 50px 50px; border-color:#0DA86B;-webkit-user-drag: none; user-drag: none; pointer-events: none; box-shadow: 0 4px 8px rgba(204, 72, 49, 1);"></center>
                </div>

                <div class="card-body py-0">

                    <h4 class="text-center p-2">LOGIN</h4>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                       style="border-radius:0; border-color:#b20000">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       name="password" required autocomplete="current-password"
                                       style="border-radius:0; border-color:#b20000">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    

                        <div class="row mb-0">
                            <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" id="btnLogin" class="btn text-light" style="background-color:#b20000; border-radius:20px 0px 20px 0px; box-shadow: 0 4px 8px rgba(13, 168, 107, 0.5);">
                                        <i id="btnIcon" class="fa fa-arrow-circle-right"></i> {{ __('Login') }}
                                    </button>
                                </div>
                                

                               
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-footer" style="background-color:#cc0000; overflow: hidden; position: relative;">
                </div>
            </div>
        </div>
    </div>
    <center>
        <small class="text-light copyright">Copyright <?=date('Y')?><br>Developed by IMX</small>
    </center>
</div>
@endsection