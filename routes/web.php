<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\UserController;
use App\Models\DataSet;
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


// User Controller

Route::get('/login', [UserController::class,'Login']);
Route::post('/login', [UserController::class,'LoginPost']);

Route::get('/register', [UserController::class,'Register']);
Route::post('/register', [UserController::class,'RegisterPost']);

Route::get('/dashboard',[UserController::class,'Dashboard']);
Route::get('/profile',[UserController::class,'Profil']);
Route::put('/profile/{id}',[UserController::class,'ProfilUpdate']);
Route::get('visualisasi',[UserController::class,'Visualisasi']);
Route::get('/data/training',[UserController::class,'Training']);
Route::get('/data/test',[UserController::class,'Testing']);

Route::get('/logout',[UserController::class,'Logout']);

// End User Contrroller

// Admin Controller
Route::get('/admin/dashboard',[AdminController::class,'AdminDashboad']);
Route::delete('/admin/user/{id}',[AdminController::class,'DeleteAccount']);
Route::put('/admin/reset/{id}',[AdminController::class,'ResetPassword']);

// End Admin Controller

// Dataset Controller

Route::post('/data/training/upload/{id}',[DatasetController::class,'UpTrainingData']);
Route::delete('/data/training/delete/{id}',[DatasetController::class,'DelTrainingData']);
Route::get('/training/start{id}',[DatasetController::class],'TrainingData');
Route::post('/data/test/upload/{id}',[DatasetController::class,'UpTestingData']);
Route::delete('/data/test/delete/{id}',[DatasetController::class,'DelTestingData']);

//End Dataset Controller

