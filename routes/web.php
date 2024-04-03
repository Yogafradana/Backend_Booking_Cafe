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


