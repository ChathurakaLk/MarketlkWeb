@extends('layout')
@section('title', 'Registration')
@section('main')
<div class="container">
  <div class="mt-5">
    <form action="{{ route('registration.post') }}" method="POST" class="ms-auto me-auto mt-auto mb-sm-5" style="width: 500px">
      @csrf

      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
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

      <button type="submit" class="btn btn-sucsess">Submit</button>
    </form>
  </div>
</div>
@endsection
