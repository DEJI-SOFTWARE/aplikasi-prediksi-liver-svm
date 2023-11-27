@extends('layouts.main');
@section('container')
<h2 class="ms-3 mb-3">DATA TRAINING</h2>
    <div class="ms-3 mb-3">
        <div class="mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputDataTraining">
                Input Data
              </button>
        </div>
        <div class="card-body shadow-lg card-table ">
            <div class="table-responsive  p-2">
                <table class="table table-bordered border-top border-2 border-dark display" cellspacing="0" id="myTableTraining">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>TB</th>
                            <th>DB</th>
                            <th>Alkaline</th>
                            <th>Aspirate</th>
                            <th>TP</th>
                            <th>ALB</th>
                            <th>A/G</th>
                            <th>Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>awdasdawdawdawdawdawd</td>
                            <td>23</td>
                            <td>124</td>
                            <td>122</td>
                            <td>4213</td>
                            <td>1241</td>
                            <td>12412</td>
                            <td>1231</td>
                            <td>1242</td>
                            <td>1231</td>
                        </tr>
                        <tr>
                            <td>=adwjak adwjkakwdka</td>
                            <td>23</td>
                            <td>124</td>
                            <td>122</td>
                            <td>19213</td>
                            <td>1241</td>
                            <td>98012</td>
                            <td>91921</td>
                            <td>1242</td>
                            <td>1231</td>
                        </tr>
                    </tbody>
                </table>    
            </div>
        </div>
    </div>


  @endsection