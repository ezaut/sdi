<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscricaoCurriculoUserEditalController;
use App\Http\Controllers\EditalController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\PontuacoeController;



/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('home_sead');
});

Route::resource('/edital', EditalController::class);
Route::resource('/oferta', OfertaController::class);
Route::resource('/pontuacao', PontuacoeController::class);

Route::get('/home_sead', function () {
    return view('home_sead');
});
//Edital Rotas
Route::get('/edital-list', [EditalController::class, 'index'])->name('edital.list');
Route::post('/add-edital',[EditalController::class,'addEdital'])->name('add.edital');
Route::get('/getEditaisList',[EditalController::class, 'getEditaisList'])->name('get.editais.list');
Route::post('/getEditalDetails',[EditalController::class, 'getEditalDetails'])->name('get.edital.details');
Route::post('/updateEditalDetails',[EditalController::class, 'updateEditalDetails'])->name('update.edital.details');
Route::post('/deleteEdital',[EditalController::class,'deleteEdital'])->name('delete.edital');

//Oferta Rotas
Route::get('/oferta-list', [OfertaController::class, 'index'])->name('oferta.list');
Route::post('/add-oferta',[OfertaController::class,'addOferta'])->name('add.oferta');
Route::get('/getOfertasList',[OfertaController::class, 'getOfertasList'])->name('get.ofertas.list');
Route::post('/getOfertaDetails',[OfertaController::class, 'getOfertaDetails'])->name('get.oferta.details');
Route::post('/updateOfertaDetails',[OfertaController::class, 'updateOfertaDetails'])->name('update.oferta.details');
Route::post('/deleteOferta',[OfertaController::class,'deleteOferta'])->name('delete.oferta');

//Pontuacoe Rotas
Route::get('/pontuacoe-list', [PontuacoeController::class, 'index'])->name('pontuacoe.list');
Route::post('/add-pontuacoe',[PontuacoeController::class,'addPontuacoe'])->name('add.pontuacoe');
Route::get('/getPontuacoesList',[PontuacoeController::class, 'getPontuacoesList'])->name('get.pontuacoes.list');
Route::post('/getPontuacoeDetails',[PontuacoeController::class, 'getPontuacoeDetails'])->name('get.pontuacoe.details');
Route::post('/updatePontuacoeDetails',[PontuacoeController::class, 'updatePontuacoeDetails'])->name('update.pontuacoe.details');
Route::post('/deletePontuacoe',[PontuacoeController::class,'deletePontuacoe'])->name('delete.pontuacoe');


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
