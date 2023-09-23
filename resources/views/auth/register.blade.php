@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form class="row g-3 needs-validation" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="col-12">
                            <label for="yourNama" class="form-label">{{ __('Nama') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="yourEmail" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="yourPassword" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="yourPassword" class="form-label">{{ __('Konfirmasi Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="col-12 text-end">
                            <a href="/login" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Daftar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="d-flex justify-content-center py-4">
    {{-- <img src="{{ asset('/') }}assets/img/logo.png" alt=""> --}}
</div>
<div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <h2 class="active"> Register Jurnalis </h2>
  
      <!-- Login Form -->
      <form method="POST" action="{{ route('register') }}">
        @csrf

        <input id="name" type="text" class="fadeIn first @error('name') is-invalid @enderror"
            name="name" value="{{ old('name') }}" placeholder="nama" required>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        
        <input id="email" type="email" class="fadeIn first @error('email') is-invalid @enderror" name="email" placeholder="email" required>
    
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="password" type="password" class="fadeIn first @error('password') is-invalid @enderror" name="password" placeholder="password" required>
    
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="password-confirm" type="password" class="fadeIn first"
            name="password_confirmation" required placeholder="confirm password" autocomplete="new-password">

        <input type="submit" class="fadeIn fourth" value="Register">
        
      </form>
  
      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="{{ route('password.request') }}">Forgot Password?</a>
      </div>
  
    </div>
</div>
@endsection
