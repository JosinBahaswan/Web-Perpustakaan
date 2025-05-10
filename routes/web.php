<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/koleksi', [PerpustakaanController::class, 'koleksi'])->name('koleksi');
// Route::get('storage/{filename}', 'PerpustakaanController@showImage')->name('storage.show');
// Route::get('/koleksi', 'LibraryController@yourMethod');
Route::get('/perpustakaan', [LibraryController::class, 'index']);
// Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi');

// // peminjaman
// Route::get('/pinjam', [PinjamController::class, 'index'])->name('pinjam.index');
// Route::post('/pinjam', [PinjamController::class, 'submitPinjam'])->name('pinjam.submit');
Route::get('/sukses-peminjaman', function () {
    return view('sukses_peminjaman');
})->name('sukses.peminjaman');

// Route for searching data
Route::get('/admin/search', [AdminController::class, 'search'])->name('admin.search');

// Route for deleting data
Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::get('/perpustakaans/users/pinjam-buku', [AdminController::class, 'index'])->name('perpustakaans.users.pinjam-buku');


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route untuk view admin (perpustakaans.peminjaman)
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/perpustakaans/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.admin.index');
// // });

// Route::get('/peminjaman', [PeminjamanController::class, 'userIndex'])->name('peminjaman.user_index');
// Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');

// // Route untuk tampilan admin
// Route::get('/perpustakaans/peminjaman', [PeminjamanController::class, 'adminIndex'])->name('peminjaman.admin_index');

// // Route untuk view user (peminjaman)
// // Route::middleware('auth')->group(function () {
//     Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.user.index');
// });

// routes/web.php
// Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.anggota');
// Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.anggotaedit');
// Route::post('/anggota/update/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
// Route::get('/anggota/delete/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');


// Route::get('/', function () {
//     return view('login');
// });

Auth::routes();
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('Perpustakaans', [PerpustakaanController::class, 'index'])->name('Perpustakaans.index');
    Route::get('Perpustakaans/create', [PerpustakaanController::class, 'create'])->name('Perpustakaans.create');
    Route::post('Perpustakaans', [PerpustakaanController::class, 'store'])->name('Perpustakaans.store');
    Route::get('Perpustakaans/{id}/edit', [PerpustakaanController::class, 'edit'])->name('Perpustakaans.edit');
    Route::put('Perpustakaans/{id}', [PerpustakaanController::class, 'update'])->name('Perpustakaans.update');
    Route::delete('Perpustakaans/{id}', [PerpustakaanController::class, 'destroy'])->name('perpustakaans.destroy');
    Route::get('Perpustakaans/{id}', [PerpustakaanController::class, 'show'])->name('Perpustakaans.show');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    // admin anggota
    // Route for displaying the list of users
        Route::get('/admin/users', [MemberController::class, 'index'])->name('admin.users.index');
        // Route for searching users
        Route::get('/perpustakaans/users/search', [MemberController::class, 'search'])->name('perpustakaans.users.search');
        // Route::delete('/perpustakaans/users/delete/{id}', [MemberController::class, 'destroy'])->name('perpustakaans.users.destroy');
        // Route for displaying the index page
        Route::get('/perpustakaans/users', [MemberController::class, 'index'])->name('perpustakaans.users.index');
        // Handle the delete operation
        Route::delete('/perpustakaans/users/{id}/destroy', [MemberController::class, 'destroy'])->name('perpustakaans.users.destroy');
        // Route for handling the delete operation
        Route::delete('/perpustakaans/users/delete/{id}', [MemberController::class, 'destroy'])->name('perpustakaans.users.destroy');
    // routes/web.php

});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/

Route::get('/pinjam', [PinjamController::class, 'index'])->name('pinjam.index');
Route::middleware(['auth', 'user-access:user'])->group(function () {

    // Add other admin-specific routes here
    Route::post('/pinjam', [PinjamController::class, 'submitPinjam'])->name('pinjam.submit');
});
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
