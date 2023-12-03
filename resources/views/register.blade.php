@extends('layouts.public-page.main')
@section('containers')
<div class="text-center mt-2">
    <img src="https://icon-library.com/images/liver-icon/liver-icon-21.jpg" style="height: 80px;" alt="logo">
    <h4 class="mt-1 mb-2">Register</h4>
</div>
<form action="/register" method="POST">
    @csrf
    <div class="mb-2">
        <label class="form-label" for="name">Nama Lengkap</label>
        <input type="text" id="name" name="name"
            class="form-control border border-success @error('name') is-invalid @enderror" />
        @error('name')
        <div class="invalid-feedback">
            {{$errors->message}}
        </div>
        @enderror
    </div>
    <div class="mb-2">
        <label class="form-label" for="email">Email</label>
        <input type="email" id="email" name="email"
            class="form-control border border-success @error('email') is-invalid @enderror" />
        @error('title')
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
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="mb-1">
        <button type="submit" class="btn btn-success container">Register</button>
    </div>
</form>
@endsection
