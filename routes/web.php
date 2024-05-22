<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//==============================================================================================================//

// route menu

use App\Http\Controllers\HomeController;

// route menampilkan dashboard
Route::get('/', [HomeController::class, 'index']);

//menampilkan data menu
use App\Http\Controllers\MenuController;
Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');

// route tambah data menu
Route::get('/menus/create', [MenuController::class, 'create'])->name('menus.create');
Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');

// route update menu
Route::get('/menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');
Route::put('/menus/{menu}', [MenuController::class, 'update'])->name('menus.update');

// route delete data menu
Route::delete('/menus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');

//==============================================================================================================//

//untuk menampilkan kategori
use App\Http\Controllers\KategoriController;

Route::get('/kategori', [KategoriController::class, 'index']);

//untuk tambah data kategori
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');

//untuk edit atau update data kategori
Route::get('/kategori/{id_kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id_kategori}', [KategoriController::class, 'update'])->name('kategori.update');

//untuk menghapus data kategori
Route::delete('/kategori/{id_kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

//==============================================================================================================//

//untuk menampilkan meja
use App\Http\Controllers\MejaController;

Route::get('/meja', [MejaController::class, 'index']);
//untuk keperluan tautan
Route::get('/meja', [MejaController::class, 'index'])->name('meja.index');

//tambah data meja
Route::get('/meja/create', [MejaController::class, 'create'])->name('meja.create');
Route::post('/meja', [MejaController::class, 'store'])->name('meja.store');

// edit data meja
Route::get('/meja/{meja}/edit', [MejaController::class, 'edit'])->name('meja.edit');
Route::put('/meja/{meja}', [MejaController::class, 'update'])->name('meja.update');

//delete data meja
Route::delete('/meja/{meja_id}', [MejaController::class, 'destroy'])->name('meja.destroy');

//==============================================================================================================//

//menampilkan data admin atau user
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index'])->name('users.index');

//untuk tambah data users
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

//untuk edit data users
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

//untuk delete data
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

//==============================================================================================================//

use App\Http\Controllers\PemesananController;

Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');

Route::get('/pemesanan/create', [PemesananController::class, 'create'])->name('pemesanan.create');
Route::post('/pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');
Route::get('/pemesanan/{id}/edit', [PemesananController::class, 'edit'])->name('pemesanan.edit');
Route::put('/pemesanan/{id}', [PemesananController::class, 'update'])->name('pemesanan.update');
Route::delete('/pemesanan/{id}', [PemesananController::class, 'destroy'])->name('pemesanan.destroy');


