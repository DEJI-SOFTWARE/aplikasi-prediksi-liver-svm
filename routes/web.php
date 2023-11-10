<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[UserController::class,'Dashboard'])->name('dashboard');

Route::get('/login',[LoginController::class,'LoginView'])->name('login');
Route::post('/login',[LoginController::class,'login']);

Route::get('/register', [LoginController::class,'RegisterView'])->name('register');
Route::post('/register',[LoginController::class,'register']);
