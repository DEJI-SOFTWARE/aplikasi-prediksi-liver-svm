@extends('layouts.main');
@section('container')
    <h1 class="mb-3 ms-3">VISUALISASI</h1>
    <div class="mb-3 ms-3">
        <div class="card shadow-lg p-3 border border-info" style="width: 950px;">
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
                        <td>{{ $data['dataAktual']['dataPositif'] }}</td>
                        <td>{{ $data['dataAktual']['dataNegatif'] }}</td>
                    </tr>
                    <tr>
                        <td>SVM</td>
                        <td>{{ $data['dataPrediksi']['dataPositif'] }}</td>
                        <td>{{ $data['dataPrediksi']['dataNegatif'] }}</td>
                    </tr>
                    <tr>
                        <td>Selisih</td>
                        <td> {{ $data['selisih']['positif'] }}
                        </td>
                        <td>{{ $data['selisih']['negatif'] }}
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Akurasi : {{ $data['akurasi'] }}%</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="d-flex mt-3">
            <div class="card shadow-lg me-5 border border-info p-3" style="width: 425px">
                <h5>Visualisasi</h5>
                <div class="text-center">
                    <div style="width: 300px; margin: auto;">
                        <canvas id="visualChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="card shadow-lg ms-5 border border-info p-3" style="width: 425px">
                <h5>Akurasi</h5>
                <div class="text-center">
                    <div style="width: 300px; margin: auto;">
                        <canvas id="akurasiChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script type="module" src="{{ mix('/resources/js/app.js') }}"></script>
@endsection
