<?php

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

Route::post('/login', function (Request $request) {
    $email = $request->input('email');
    $pasword = $request->input('password');

    if($email == 'feri@mgail.com' && $pasword == '123') {
        return 'berhasil login';
    }
    return 'gagal login';


});

Route::get('/login', function () {
    return view('login');
});
