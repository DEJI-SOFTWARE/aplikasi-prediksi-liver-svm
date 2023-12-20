<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Models\DataSet;
use App\Models\DataTesting;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Dashboard Routes
Route::get('/dashboard', [PageController::class, 'Dashboard'])->name('dashboard')->middleware('auth');

//Login Routes
Route::get('/login', [PageController::class, 'Login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'Login']);

//Register Routes
Route::get('/register', [PageController::class, 'Register'])->name('register')->middleware('guest');
Route::post('/register', [LoginController::class, 'Register']);

//Profile Routes
Route::get('/profile', [PageController::class, 'Profile'])->name('profile');
Route::put('/profile/{id}', [UserController::class, 'UpdateProfile']);
Route::patch('/profile/password', [UserController::class, 'UpdatePassword']);


// Training Routes;
Route::get('/data/training', [PageController::class, 'Training']);
Route::post('/data/training', [DatasetController::class, 'StoreDataTraining']);
Route::get('/training/start', [DatasetController::class, 'TrainingDataStart']);
Route::get('/training/delete', [DatasetController::class, 'DeleteDataTraining']);

//Testing Routes
Route::get('/data/testing', [PageController::class, 'Testing']);
Route::post('/data/testing', [DatasetController::class, 'StoreDataTesting']);
Route::get('/testing/start', [DatasetController::class, 'TestingDataStart']);
Route::delete('/data/testing', [DatasetController::class, 'DeleteDataTesting']);
Route::post('/data/training/upload/{id}', [DatasetController::class, 'UpTrainingData']);
Route::delete('/data/training/delete/{id}', [DatasetController::class, 'DelTrainingData']);
Route::post('/data/test/upload/{id}', [DatasetController::class, 'UpTestingData']);
Route::delete('/data/test/delete/{id}', [DatasetController::class, 'DelTestingData']);

//Visualisasi Routes
Route::get('/visualisasi', [PageController::class, 'Visualisasi']);

//Logout Routes
Route::delete('/logout', [LoginController::class, 'Logout']);


// Admin Routes
Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboad']);
Route::delete('/admin/user/{id}', [AdminController::class, 'DeleteAccount']);
Route::put('/admin/reset/{id}', [AdminController::class, 'ResetPassword']);


Route::get('/', [PageController::class, 'index']);
Route::get('/test', function () {

    $dataTraining = DataSet::all();

    $dataAktual = [
        'positif' => $dataTraining->where('hasil', 1)->count(),
        'negatif' => $dataTraining->where('hasil', -1)->count()
    ];

    $dataPrediksi = [
        'positif' => $dataTraining->where('prediksi', 1)->count(),
        'negatif' => $dataTraining->where('prediksi', -1)->count()
    ];

    $dataSet = [
        'aktual' => $dataAktual,
        'prediksi' => $dataPrediksi,
        'selisih' => [
            'positif' => abs($dataAktual['positif'] - $dataPrediksi['positif']),
            'negatif' => abs($dataAktual['negatif'] - $dataPrediksi['negatif']),
        ],
    ];
    return json_encode($dataSet);
});

