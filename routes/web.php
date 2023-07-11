<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KursusController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', [KursusController::class, 'index'])->name('kursus.index');
Route::get('/tambah-kursus', [KursusController::class, 'create'])->name('kursus.create');
Route::post('/tambah-kursus', [KursusController::class, 'store'])->name('kursus.store');
Route::get('/edit-kursus/{id}', [KursusController::class, 'edit'])->name('kursus.edit');
Route::put('/edit-kursus/{id}', [KursusController::class, 'update'])->name('kursus.update');
Route::delete('/beranda/hapus/{id}', [KursusController::class, 'destroy'])->name('kursus.destroy');
Route::get('/beranda/detail-kursus/{id}', [KursusController::class, 'show'])->name('kursus.show');
