<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('search');
});


Route::get('/business',[EventController::class,'getParametersBusiness']);
Route::get('/business/{titulo}',[EventController::class,'showBussiness']);
Route::get('/admin',[EventController::class,'getData']);//pegar os dados salvos do adm
Route::post('/admin',[EventController::class,'getAdm']);//consulta no banco
Route::get('/register',[EventController::class,'getCategories']);
Route::post('/register',[EventController::class,'setEmpresas']);
Route::get('/logOut',[EventController::class,'logOut']);

//Route::get('/{data}',[EventController::class,'getParametersSearch']);
//Route::get('/empresas', [EventController::class,'urlPesquisa
