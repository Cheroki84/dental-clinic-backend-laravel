<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DentistaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('clientes/register', [ClienteController::class,'store']);
Route::post('clientes/login', [ClienteController::class, 'login'])->name('login');
Route::get('clientes/logout', [ClienteController::class, 'logout'])->middleware('auth:api');

Route::get('clientesConCitas', [ClienteController::class, 'indexAll']);
Route::apiResource('clientes', ClienteController::class)->middleware('auth:api');

Route::get('citas', [CitaController::class, 'indexAll']);
Route::post('citas/store', [CitaController::class,'store'])->name('citas.store');

Route::apiResource('cliente.citas', CitaController::class);

Route::post('dentistas/register', [DentistaController::class, 'store']);
Route::post('dentistas/login', [DentistaController::class, 'login'])->name('login');