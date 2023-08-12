<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscricaoCurriculoUserEditalController;
use App\Http\Controllers\EditalController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\PontuacoeController;
use App\Http\Controllers\CurriculoController;
use App\Http\Controllers\HomeSeadController;




/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [HomeSeadController::class, 'index'])->name('index');
Route::get('/home_sead', [HomeSeadController::class, 'index'])->name('index');

Auth::routes();

//Normal Users Routes List
Route::middleware(['auth', 'user-access:user', 'PreventBackHistory'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

});

//Admin Routes List
Route::middleware(['auth', 'user-access:admin', 'PreventBackHistory'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

//Servidor Routes List
Route::middleware(['auth', 'user-access:servidor', 'PreventBackHistory'])->group(function () {

    Route::get('/servidor/home', [HomeController::class, 'servidorHome'])->name('servidor.home');
    Route::get('ajax-crud-datatable', [InscricaoCurriculoUserEditalController::class, 'index']);
    Route::post('store', [InscricaoCurriculoUserEditalController::class, 'store']);
    Route::post('edit', [InscricaoCurriculoUserEditalController::class, 'edit']);
    Route::post('delete', [InscricaoCurriculoUserEditalController::class, 'destroy']);

    Route::resource('/edital', EditalController::class);
    Route::resource('/oferta', OfertaController::class);
    Route::resource('/pontuacao', PontuacoeController::class);
});
