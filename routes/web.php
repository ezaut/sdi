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
    Route::get('/inscricao', [InscricaoCurriculoUserEditalController::class, 'index'])->name('inscricao.index');
    Route::get('/inscricao/criar/{edital}', [InscricaoCurriculoUserEditalController::class, 'create'])->name('inscricao.create');
    Route::post('/inscricao', [InscricaoCurriculoUserEditalController::class, 'store'])->name('inscricao.store');
    Route::get('/inscricao/{inscricao}', [InscricaoCurriculoUserEditalController::class, 'show'])->name('inscricao.show');
    Route::get('/inscricao/{inscricao}/editar', [InscricaoCurriculoUserEditalController::class, 'edit'])->name('inscricao.edit');
    Route::put('/inscricao/{inscricao}', [InscricaoCurriculoUserEditalController::class, 'update'])->name('inscricao.update');
    Route::delete('/inscricao/{inscricao}', [InscricaoCurriculoUserEditalController::class, 'destroy'])->name('inscricao.destroy');
    Route::resource('/edital', EditalController::class);

});

//Admin Routes List
Route::middleware(['auth', 'user-access:admin', 'PreventBackHistory'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::put('/admin/users/{id}', [HomeController::class, 'updateUserType'])->name('admin.updateUserType');
});

//Servidor Routes List
Route::middleware(['auth', 'user-access:servidor', 'PreventBackHistory'])->group(function () {

    Route::get('/servidor/home', [HomeController::class, 'servidorHome'])->name('servidor.home');
    //Route::get('/inscricao', [InscricaoCurriculoUserEditalController::class, 'index'])->name('inscricao.index');
    //Route::get('/inscricao/criar', [InscricaoCurriculoUserEditalController::class, 'create'])->name('inscricao.create');
    //Route::post('/inscricao', [InscricaoCurriculoUserEditalController::class, 'store'])->name('inscricao.store');
    Route::get('/inscricao/{inscricao}', [InscricaoCurriculoUserEditalController::class, 'show'])->name('inscricao.show');
    Route::get('/inscricao/{inscricao}/editar', [InscricaoCurriculoUserEditalController::class, 'edit'])->name('inscricao.edit');
    Route::put('/inscricao/{inscricao}', [InscricaoCurriculoUserEditalController::class, 'update'])->name('inscricao.update');
    Route::delete('/inscricao/{inscricao}', [InscricaoCurriculoUserEditalController::class, 'destroy'])->name('inscricao.destroy');

    Route::resource('/edital', EditalController::class);
    Route::resource('/oferta', OfertaController::class);
    Route::resource('/pontuacao', PontuacoeController::class);
});
