@extends('layouts.public-page.main')
@section('containers')
@include('sweetalert::alert')
<div class="text-center mt-2">
    <img src="https://icon-library.com/images/liver-icon/liver-icon-21.jpg" style="height: 80px;" alt="logo">
    <h4 class="mt-1 mb-2">Login</h4>
</div>
<form action="/login" method="POST">
    @csrf()
    <div class="mb-3">
        <label class="form-label" for="email">Email</label>
        <input type="email" id="email" name="email"
            class="form-control border border-success @error('email') is-invalid @enderror" />
        @error('email')
        <div class="invalid-feedback">
            {{$errors->message}}
        </div>
        @enderror
    </div>
    <div class="mb-2">
        <label class="form-label" for="password">Password</label>
        <input type="password" id="password" name="password"
            class="form-control border border-success @error('password') is-invalid @enderror" />
        @error('password')
        <div class="invalid-feedback">
            {{$errors->message}}
        </div>
        @enderror
        <div class="form-check mt-1">
            <input class="form-check-input bg-success" type="checkbox" id="form-checkbox" onclick="showHide()">
            <label class="form-check-label" for="form-checkbox">Tampilkan Password</label>
        </div>
    </div>
    <div class="mt-2 mb-1">
        <a href="#" class="text-success">Lupa Password?</a>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success container">Login</button>
    </div>
</form>
@endsection
