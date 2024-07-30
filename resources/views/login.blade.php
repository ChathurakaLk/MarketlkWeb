@extends('layout')
@section('title', 'Login')
@section('main')
<div class="main">
    <div class="container">
       
        <form action="{{ route('login.post') }}" method="POST" class="ms-auto me-auto mt-auto mb-sm-5" style="width: 500px">
            @csrf

            <div class="mt-5">
                @if($errors->any() && !($errors->has('email') || $errors->has('password')))
                
                    @foreach ($errors->all() as $error )
                    <div class="msg-danger-text ms-auto">{{$error}}</div>
                    @endforeach
                
                @endif
    
                @if(session()->has('error') && !$errors->hasAny(['email', 'password']))
                <div class="msg-danger-text ms-auto">{{ session('error') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-sucsess me-2">Login</button>

            @if (!Auth::check())
            <a href="{{ route('registration') }}" class="btn btn-sucsess me-2">Register Now</a>
            @endif {{-- not Auth user add button to register --}}
        </form>
    </div>
</div>
@endsection
