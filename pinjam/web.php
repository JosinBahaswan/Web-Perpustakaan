<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\AdminController;


Route::get('Perpustakaans', [PerpustakaanController::class, 'index'])->name('Perpustakaans.index');
Route::get('Perpustakaans/create', [PerpustakaanController::class, 'create'])->name('Perpustakaans.create');
Route::post('Perpustakaans', [PerpustakaanController::class, 'store'])->name('Perpustakaans.store');
Route::get('Perpustakaans/{id}/edit', [PerpustakaanController::class, 'edit'])->name('Perpustakaans.edit');
Route::put('Perpustakaans/{id}', [PerpustakaanController::class, 'update'])->name('Perpustakaans.update');
Route::delete('Perpustakaans/{id}', [PerpustakaanController::class, 'destroy'])->name('perpustakaans.destroy');
Route::get('Perpustakaans/{id}', [PerpustakaanController::class, 'show'])->name('Perpustakaans.show');

Route::get('/koleksi', [PerpustakaanController::class, 'koleksi'])->name('koleksi');
// Route::get('storage/{filename}', 'PerpustakaanController@showImage')->name('storage.show');
// Route::get('/koleksi', 'LibraryController@yourMethod');


Route::get('/perpustakaan', [LibraryController::class, 'index']);
// Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi');

// routes/web.php
Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.anggota');
Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.anggotaedit');
Route::post('/anggota/update/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
Route::get('/anggota/delete/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/pinjam', [PinjamController::class, 'index'])->name('pinjam.index');
Route::post('/pinjam', [PinjamController::class, 'submitPinjam'])->name('pinjam.submit');
Route::get('/sukses-peminjaman', function () {
    return view('sukses_peminjaman');
})->name('sukses.peminjaman');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
