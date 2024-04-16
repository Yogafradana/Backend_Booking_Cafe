<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route menu

use App\Http\Controllers\HomeController;

// route menampilkan data menu
Route::get('/', [HomeController::class, 'index']);

// route tambah data menu
use App\Http\Controllers\MenuController;
Route::get('/menus/create', [MenuController::class, 'create'])->name('menus.create');
Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');

// route update menu
Route::get('/menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');
Route::put('/menus/{menu}', [MenuController::class, 'update'])->name('menus.update');

// route delete data menu
Route::delete('/menus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');

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

