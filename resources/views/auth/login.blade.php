@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center py-4">
    <img src="{{ asset('/') }}assets/img/logo.png" alt="">
</div>
<div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <h2 class="active"> Login </h2>
  
      <!-- Login Form -->
      <form method="POST" action="{{ route('login') }}">
        @csrf

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

        <input type="submit" class="fadeIn fourth" value="Login">
        
      </form>
  
      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="{{ route('password.request') }}">Forgot Password?</a>
      </div>
  
    </div>
</div>

@endsection
