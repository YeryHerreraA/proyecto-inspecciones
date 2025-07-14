<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InspeccionController;
use App\Http\Controllers\CondicionController;

Route::get('/', [InspeccionController::class, 'index']);
Route::resource('inspecciones', InspeccionController::class);
Route::resource('condiciones', CondicionController::class);
