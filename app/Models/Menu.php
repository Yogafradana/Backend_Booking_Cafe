<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Model untuk menampilkan menu ==> By Frada

class Menu extends Model
{
    use HasFactory;

    protected $primaryKey = 'menu_id';

    protected $table = 'Menu';

    protected $fillable = ['nama_menu', 'deskripsi', 'id_kategori', 'harga', 'gambar', 'stok'];

    // Relasi dengan Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}



