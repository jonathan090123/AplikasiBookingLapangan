<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/pesanan/create', [PesananController::class, 'create'])->name('pesanan.create');
Route::post('/pesanan/store', [PesananController::class, 'store'])->name('pesanan.store');
Route::get('/pesanan/index', [PesananController::class, 'index'])->name('pesanan.index');
Route::get('/pesanan/{id}/edit', [PesananController::class, 'edit'])->name('pesanan.edit');
Route::put('/pesanan/{id}', [PesananController::class, 'update'])->name('pesanan.update');
Route::resource('pesanan', PesananController::class);   
