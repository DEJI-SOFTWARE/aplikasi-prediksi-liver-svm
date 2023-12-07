@extends('layouts.main');
@section('container')
<h2 class="ms-3 mb-3">PROFILE</h2>
<div class="row ms-3">
    <div class="card shadow-lg bg-warning card-photo-profile">
        <img src="{{asset('storage/'.$user->image)}}" class="rounded-circle w-50 h-50 border border-4 border-light"
            style="border-color: #F4C430;" alt="" width="150px">
    </div>
    <div class="card shadow-lg card-profile">
        <div class=" p-4 fs-5">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" style="border-color: #F4C430; border-width:3px;" id="name"
                    name="name" value="{{$user->name}}" readonly>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" style="border-color: #F4C430; border-width:3px;" id="email"
                    name="email" value="{{$user->email}}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label> <br>
                <button type="button" class="btn btn-primary text-light" data-bs-toggle="modal"
                    data-bs-target="#changePassword">
                    Ubah Password
                </button>
            </div>
            <div class="mb-3">
                <button type="button" class="btn btn-warning text-light container" data-bs-toggle="modal"
                    data-bs-target="#profile">
                    Ubah Profil
                </button>
            </div>
        </div>
    </div>
</div>

<!--Modal Edit Profile (Name & Username) -->
<div class="modal fade" id="profile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="profileLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-5 text-light" id="profileLabel">Ubah Profil</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="/profile/{{$user->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Foto</label>
                        <input type="file" class="form-control" style="border-color: #F4C430; border-width:3px;"
                            id="image" name="image" >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" style="border-color: #F4C430; border-width:3px;"
                            id="email" name="email" value="{{$user->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" style="border-color: #F4C430; border-width:3px;"
                            id="nama" name="name" value="{{$user->name}}">
                    </div>
                </div>
                <div class="modal-footer bg-warning">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End Modal Profile (Name & Username) -->

<!-- Password -->
<div class="modal fade" id="changePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="changePasswordLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-warning">
            <h1 class="modal-title fs-5" id="changePasswordLabel">Ubah Password</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/profile/password" method="post">
            @method('PATCH')
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="passOld" class="form-label">Password Lama</label>
                <input type="password" class="form-control" style="border-color: #F4C430; border-width:3px;"
                    id="passOld" name="old_password">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Password Baru</label>
                <input type="password" class="form-control" style="border-color: #F4C430; border-width:3px;"
                    id="password" name="new_password">
            </div>
        </div>
        <div class="modal-footer bg-warning">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Ubah Password</button>
        </div>
    </form>
    </div>
</div>
</div>
{{-- End Modal Password --}}
@endsection
