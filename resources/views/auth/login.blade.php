@extends('layouts.auth')

@section('auth-form')

<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
</div>
<form method="POST" class="user" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <input type="email" id="email" name="email"
            class="form-control form-control-user @error('email') is-invalid @enderror" value="{{ old('email') }}"
            aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" id="password" name="password"
            class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Password"
            required autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="customCheck">
            <label class="custom-control-label" for="customCheck">Remember
                Me</label>
        </div>
    </div>
    <button class="btn btn-primary btn-user btn-block" type="submit">
        Login
    </button>
</form>
<hr>
@if (Route::has('password.request'))
<div class="text-center">
    <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
</div>
@endif


@endsection