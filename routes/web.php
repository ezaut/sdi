<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('home_sead');
});

Route::get('/home_sead', function () {
    return view('home_sead');
});

Auth::routes();

//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

//Servidor Routes List
Route::middleware(['auth', 'user-access:servidor'])->group(function () {

    Route::get('/servidor/home', [HomeController::class, 'servidorHome'])->name('servidor.home');
});
