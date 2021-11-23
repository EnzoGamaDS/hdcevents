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

Route::get('/',[EventController::class, 'index']);

Route::get('/events/create',[EventController::class, 'create']);

Route::post('/events', [EventController::class, 'store']);

Route::get('/contact',[EventController::class, 'contact']);