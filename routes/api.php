<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InspeccionController;
use App\Http\Controllers\CondicionController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');

// Inspecciones
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/inspecciones', [InspeccionController::class, 'apiIndex']);
    Route::get('/inspecciones/{id}', [InspeccionController::class, 'apiShow']);
    Route::post('/inspecciones', [InspeccionController::class, 'apiStore']);
    Route::delete('/inspecciones/{id}', [InspeccionController::class, 'apiDestroy']);
    Route::post('/condiciones', [CondicionController::class, 'apiStore']);
});
