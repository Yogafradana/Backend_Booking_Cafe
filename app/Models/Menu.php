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

    public function reduceStock($quantity)
    {
        if ($this->stok >= $quantity) {
            $this->stok -= $quantity;
            $this->save();
            return true;
        }
        return false;
    }

    //relasi ke tabel detail pemesanan
    public function detailPemesanans()
    {
        return $this->hasMany(DetailPemesanan::class, 'menu_id');
    }
}



