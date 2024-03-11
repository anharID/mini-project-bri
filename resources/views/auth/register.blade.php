@extends('layouts.auth')

@section('auth-form')


<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
</div>
<form class="user" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group">
        <input type="text" name="name" class="form-control form-control-user @error('name') is-invalid @enderror"
            id="name" value="{{ old('name') }}" placeholder="Your Name">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control form-control-user  @error('email') is-invalid @enderror"
            id="email" value="{{ old('email') }}" placeholder=" Email Address">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" name="password"
                class="form-control form-control-user @error('password') is-invalid @enderror" id="password"
                placeholder="Password">
        </div>
        <div class="col-sm-6">
            <input type="password" name="password_confirmation" class="form-control form-control-user"
                id="password-confirm" placeholder="Repeat Password">
        </div>
    </div>
    <a href="login.html" class="btn btn-primary btn-user btn-block">
        Register Account
    </a>
</form>
<hr>
<div class="text-center">
    <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
</div>

@endsection