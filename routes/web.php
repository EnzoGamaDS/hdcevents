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
Route::get('/events/create',[EventController::class, 'create']);
    //mostra um dado especifico no banco
Route::get('/events/{id}',[EventController::class, 'show']);
    //enviar os dados do banco
Route::post('/events', [EventController::class, 'store']);

Route::get('/contact',[EventController::class, 'contact']);