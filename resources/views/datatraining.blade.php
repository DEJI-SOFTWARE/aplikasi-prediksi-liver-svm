@extends('layouts.main');
@section('container')
    @include('sweetalert::alert')
    <h2 class="ms-3 mb-3">DATA TRAINING</h2>
    <div class="ms-3 mb-3">
        <div class="d-flex">
            <div class="mb-3 mx-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputDataTraining"><i
                        class="fa-solid fa-upload"></i>&nbsp;
                    Input Data
                </button>
            </div>
            <form action="/training/start" method="get">
                @method('GET')
                @csrf
                <div class="mx-2">
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-vial-circle-check"></i>&nbsp;Latih
                        Data</button>
                </div>
            </form>
            <div class="mx-2">
                <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteDataTraining"><i
                        class="fa-solid fa-trash"></i>&nbsp;Hapus Data</button>
            </div>
        </div>

        <div class="card-body shadow-lg card-table ">
            <div class="table-responsive  p-2">
                <table class="table table-bordered border-top border-2 border-dark display" cellspacing="0"
                    id="myTableTraining">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>TB</th>
                            <th>DB</th>
                            <th>Alkaline</th>
                            <th>Alamine</th>
                            <th>Aspirate</th>
                            <th>TP</th>
                            <th>ALB</th>
                            <th>A/G</th>
                            <th>Hasil</th>
                            <th>Prediksi</>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_training as $data)
                            <tr>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->tb }}</td>
                                <td>{{ $data->db }}</td>
                                <td>{{ $data->alkaline }}</td>
                                <td>{{ $data->alamine }}</td>
                                <td>{{ $data->aspirate }}</td>
                                <td>{{ $data->tp }}</td>
                                <td>{{ $data->alb }}</td>
                                <td>{{ $data->ag }}</td>
                                <td>{{ $data->hasil }}</td>
                                <td>{{ $data->prediksi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Upload Training Data --}}
    <div class="modal fade" id="inputDataTraining" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="inputDataTrainingLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="inputDataTrainingLabel">Input Data Training</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/data/training" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Masukan data training dalam bentuk format file <b>csv,
                                    xls, xlsx</b></label>
                            <input class="form-control" type="file" name="data_training" id="formFile">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal Upload Training Data --}}

    {{-- Modal Delete Training Data --}}
    <div class="modal fade" id="deleteDataTraining" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="deleteDataTrainingLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="inputDataTrainingLabel">Hapus Data Training</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/training/delete" method="post">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus training data ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal Delete Training Data --}}
@endsection
