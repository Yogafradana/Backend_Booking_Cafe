<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//==============================================================================================================//
// route menampilkan dashboard

use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index']);

//==============================================================================================================//
//untuk menampilkan menu

use App\Http\Controllers\MenuController;
Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');
Route::get('/menus/create', [MenuController::class, 'create'])->name('menus.create');
Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');
Route::get('/menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');
Route::put('/menus/{menu}', [MenuController::class, 'update'])->name('menus.update');
Route::delete('/menus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');

//==============================================================================================================//
//untuk menampilkan kategori

use App\Http\Controllers\KategoriController;
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id_kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id_kategori}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id_kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

//==============================================================================================================//
//untuk menampilkan meja

use App\Http\Controllers\MejaController;
Route::get('/meja', [MejaController::class, 'index'])->name('meja.index');
Route::get('/meja/create', [MejaController::class, 'create'])->name('meja.create');
Route::post('/meja', [MejaController::class, 'store'])->name('meja.store');
Route::get('/meja/{meja}/edit', [MejaController::class, 'edit'])->name('meja.edit');
Route::put('/meja/{meja}', [MejaController::class, 'update'])->name('meja.update');
Route::delete('/meja/{meja_id}', [MejaController::class, 'destroy'])->name('meja.destroy');

//==============================================================================================================//
//untuk menampilkan user

use App\Http\Controllers\UserController;
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

//==============================================================================================================//

//untuk menampilkan pemesanan
use App\Http\Controllers\PemesananController;

Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
Route::get('/pemesanan/create', [PemesananController::class, 'create'])->name('pemesanan.create');
Route::post('/pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');
Route::get('/pemesanan/{id}/edit', [PemesananController::class, 'edit'])->name('pemesanan.edit');
Route::put('/pemesanan/{id}', [PemesananController::class, 'update'])->name('pemesanan.update');
Route::delete('/pemesanan/{id}', [PemesananController::class, 'destroy'])->name('pemesanan.destroy');
Route::get('/pemesanan/{id}', [PemesananController::class, 'show'])->name('pemesanan.show');
Route::put('pemesanan/{id}/update-status', [PemesananController::class, 'updateStatus'])->name('pemesanan.updateStatus');


//==============================================================================================================//
//untuk menampilkan review
use App\Http\Controllers\ReviewController;

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews/{id}', [ReviewController::class, 'show'])->name('reviews.show');

//==============================================================================================================//
//Route Dashboard

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

//==============================================================================================================//

