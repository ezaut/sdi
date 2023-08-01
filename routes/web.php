<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscricaoCurriculoUserEditalController;
use App\Http\Controllers\EditalController;


/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('home_sead');
});

Route::get('/home_sead', function () {
    return view('home_sead');
});

Route::get('/edital-list', [EditalController::class, 'index'])->name('edital.list');
Route::post('/add-edital',[EditalController::class,'addEdital'])->name('add.edital');
Route::get('/getEditaisList',[EditalController::class, 'getEditaisList'])->name('get.editais.list');
Route::post('/getEditalDetails',[EditalController::class, 'getEditalDetails'])->name('get.edital.details');
Route::post('/updateEditalDetails',[EditalController::class, 'updateEditalDetails'])->name('update.edital.details');
Route::post('/deleteEdital',[EditalController::class,'deleteEdital'])->name('delete.edital');

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
    Route::get('ajax-crud-datatable', [InscricaoCurriculoUserEditalController::class, 'index']);
    Route::post('store', [InscricaoCurriculoUserEditalController::class, 'store']);
    Route::post('edit', [InscricaoCurriculoUserEditalController::class, 'edit']);
    Route::post('delete', [InscricaoCurriculoUserEditalController::class, 'destroy']);
});
