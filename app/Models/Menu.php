<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Model untuk menampilkan menu ==> By Frada

class Menu extends Model
{
    use HasFactory;

    protected $table = 'Menu';

    protected $fillable = ['nama_menu', 'deskripsi', 'kategori', 'harga', 'gambar'];
}
