<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalsController;

// Rute untuk tampilan homepage
Route::get('/', function () {
    return view('welcome'); // Mengembalikan tampilan welcome
});



Route::get('/animals', [AnimalsController::class, 'index']); // Menampilkan semua hewan
Route::post('/animals', [AnimalsController::class, 'store']); // Menambahkan hewan baru
Route::put('/animals/{id}', [AnimalsController::class, 'update']); // Mengupdate hewan berdasarkan ID
Route::delete('/animals/{id}', [AnimalsController::class, 'delete']); // Menghapus hewan berdasarkan ID
