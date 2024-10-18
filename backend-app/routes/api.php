<?php

use App\Http\Controllers\AnimalsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rute untuk mendapatkan informasi pengguna yang terautentikasi
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rute untuk Animals
Route::get('/animals', [AnimalsController::class, 'index']);
Route::post('/animals', [AnimalsController::class, 'store']);
Route::put('/animals/{id}', [AnimalsController::class, 'update']);
Route::delete('/animals/{id}', [AnimalsController::class, 'delete']);