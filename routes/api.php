<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Public Service API
Route::get('/services', [\App\Http\Controllers\Api\ServiceController::class, 'index'])->name('api.services.index');
Route::get('/services/{id}', [\App\Http\Controllers\Api\ServiceController::class, 'show'])->name('api.services.show');
