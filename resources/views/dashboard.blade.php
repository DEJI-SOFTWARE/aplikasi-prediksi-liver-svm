@extends('layouts.main');
@section('container')
    <h2 class="ms-3 mb-3">DASHBOARD</h2>
    <div class="row">
        <!-- DATA TRAINING CARD -->
        <div class="col-xl-3 col-md-4 ms-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data Training</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['training'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-brain fs-2 text-gray-300 text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DATA TESING CARD -->
        <div class="col-xl-3 col-md-4 ms-3 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Data Testing</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['testing'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-microscope fs-2 text-gray-300 text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- AKURASI SVM CARD -->
        <div class="col-xl-3 col-md-4 ms-3 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Akurasi SVM
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $data['akurasi'] }}%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm border border-info mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 49%"
                                            aria-valuenow="99" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-bullseye fs-2 text-gray-300 text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
