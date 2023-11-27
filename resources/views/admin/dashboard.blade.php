@extends('layouts.admin');
@section('container')
<h2 class="ms-3 mb-3">DASHBOARD</h2>
<div class="ms-3 mb-4">
    <!-- DATA TRAINING CARD -->
    <div class="col-xl-3 col-md-4 mb-5" >
        <div class="card shadow-lg border border-info">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs fw-bolder text-info text-uppercase mb-1">
                            Jumlah Admin</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">999</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-users fs-2 text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card-body shadow-lg card-table border border-info rounded ">
        <div class="table-responsive  p-2">
            <table class="table table-bordered border-top border-2 border-info display" cellspacing="0" id="myTableTesting">
                <thead >
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Waktu Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Asep</td>
                        <td>Asep@gmail.com</td>
                        <td>19/01/2023</td>
                        <td class="text-center">
                                <button type="submit" class="btn btn-sm btn-warning me-2"><i class="fa-solid fa-key me-2"></i>Reset</button>
                                <button type="submit" class="btn btn-sm btn-danger ms-2"><i class="fa-solid fa-trash me-2"></i>Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ucup Sukucup</td>
                        <td>Ucup@gmail.com</td>
                        <td>29/08/2023</td>
                        <td class="text-center">
                                <button type="submit" class="btn btn-sm btn-warning me-2"><i class="fa-solid fa-key me-2"></i>Reset</button>
                                <button type="submit" class="btn btn-sm btn-danger ms-2"><i class="fa-solid fa-trash me-2"></i>Delete</button>
                    </td>
                    </tr>
                </tbody>
            </table>    
        </div>
    </div>
</div>
@endsection