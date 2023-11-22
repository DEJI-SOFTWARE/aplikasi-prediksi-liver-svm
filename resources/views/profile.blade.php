@extends('layouts.main');
@section('container')
<h2 class="ms-3 mb-3">PROFILE</h2>
<div class="row ms-3">
    <div class="card shadow-lg bg-warning card-photo-profile">
        <img src="img/blank-profile.png" class="rounded-circle border border-4 border-light" style="border-color: #F4C430;" alt="" width="150px">
    </div>
    <div class="card shadow-lg card-profile">
        <div class=" p-4 fs-5">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" style="border-color: #F4C430; border-width:3px;" id="name" name="name" value="" readonly>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" style="border-color: #F4C430; border-width:3px;" id="email" name="email" value="" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label> <br>
                <button type="button" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#changePassword">
                  Ubah Password
                </button>
            </div>
            <div class="mb-3">
                <button type="button" class="btn btn-warning text-light container" data-bs-toggle="modal" data-bs-target="#profile">
                    Ubah Profil
                </button>
            </div>
        </div>
    </div>
</div>
@endsection