@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')
    <div class="login-box">
        <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="index2.html" class="h1"><b>Data</b>Warga</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>
    
            <form action="{{ route('authenticate') }}" method="POST">
                @csrf
                @method('POST')
                <div class="input-group mb-3">
                    <input 
                        id="email" 
                        type="email" 
                        placeholder="Email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required autocomplete="email" 
                        autofocus
                    >

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input 
                        id="password" 
                        type="password" 
                        placeholder="Password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        name="password" 
                        required autocomplete="current-password" 
                    >

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ message }}</strong>
                        </span>
                    @enderror

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-block btn-primary">
                    Sign in
                </button>
            </form>
    
            <div class="social-auth-links text-center mt-2 mb-3">
                <a href="#" class="btn btn-block btn-danger">
                    Sign up
                </a>
            </div>
        </div>
        </div>
    </div>
@endsection