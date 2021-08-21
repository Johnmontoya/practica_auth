<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/usuarios', [UserController::class, 'indexApi']);

Route::get('/productos', [ProductoController::class, 'indexApi']);
Route::post('/productos/crear', [ProductoController::class, 'storeApi']);
Route::post('/productos/borrar/{id}', [ProductoController::class, 'destroyApi']);
Route::post('/productos/actualizar/{id}', [ProductoController::class, 'updateApi']);