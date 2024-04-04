<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori'; // Nama tabel sesuai dengan nama tabel di database
    protected $primaryKey = 'id_kategori'; // Primary key dari tabel

    // Relasi dengan Menu
    public function menus()
    {
        return $this->hasMany(Menu::class, 'id_kategori');
    }

    public function create()
    {
        $categories = Kategori::all(); // Mengambil semua kategori
        return view('menus.create', compact('categories'));
    }
}