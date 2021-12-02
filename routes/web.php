<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\EventController;
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
// Index, create, show, store, são padrões do laravel

    //mostra todos os registros
Route::get('/',[EventController::class, 'index']);
    //cria registros no banco
Route::get('/events/create',[EventController::class, 'create'])->middleware('auth');// o ->middleware('auth') só permite usuarios logados acessarem a rota
    //mostra um dado especifico no banco
Route::get('/events/{id}',[EventController::class, 'show']);
    //enviar os dados do banco
Route::post('/events', [EventController::class, 'store']);
    //deleta dados
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth');
    //altera dados
Route::get('/events/edit/{id}',[EventController::class, 'edit'])->middleware('auth');
Route::put('events/update/{id}', [EventController::class, 'update'])->middleware('auth');

Route::get('/contact',[EventController::class, 'contact']);

Route::get('/dashboard',[EventController::class, 'dashboard'])->middleware('auth');
