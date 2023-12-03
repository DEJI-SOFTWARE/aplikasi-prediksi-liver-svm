@extends('layouts.main');
@section('container')
<h1 class="mb-3 ms-3">VISUALISASI</h1>
<div class="mb-3 ms-3">
    <div class="card shadow-lg p-3 border border-info" style="width: 950px;">
        <p class="text-uppercase text-secondary">lorem ipsum</p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Klasifikasi</th>
                    <th>Aktual Positif</th>
                    <th>Aktual Negatif</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Manual</td>
                    <td>80</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>SVM</td>
                    <td>70</td>
                    <td>30</td>
                </tr>
                <tr>
                    <td>Selisih</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Akurasi : 100%</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="d-flex mt-3">
        <div class="card shadow-lg me-5 border border-info p-3" style="width: 425px">
            <h5>Visualisasi</h5>
            <div class="text-center">
                <p class="btn btn-primary" style="cursor: default">Positif</p>
                <p class="btn btn-danger" style="cursor: default">Negatif</p>
            </div>
        </div>
        <div class="card shadow-lg ms-5 border border-info p-3" style="width: 425px">
            <h5>Akurasi</h5>
            <div class="text-center">
                <p class="btn btn-primary" style="cursor: default">Positif</p>
                <p class="btn btn-danger" style="cursor: default">Negatif</p>
            </div>
        </div>
    </div>
</div>
@endsection
