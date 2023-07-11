<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KursusController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', [KursusController::class, 'index'])->name('kursus.index');
Route::get('/tambah-kursus', [KursusController::class, 'create'])->name('kursus.create');
Route::post('/tambah-kursus', [KursusController::class, 'store'])->name('kursus.store');
Route::get('/edit-kursus', [KursusController::class, 'edit'])->name('kursus.edit');
Route::put('/edit-kursus', [KursusController::class, 'update'])->name('kursus.update');
