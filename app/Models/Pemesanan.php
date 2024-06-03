<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{

    use HasFactory;

    protected $primaryKey = 'pemesanan_id';
    protected $table = 'pemesanan';

    protected $fillable = [
        'nama_pengunjung', 'meja_id', 'menu_id', 'jumlah', 'subtotal', 'tanggal_pemesanan', 'status'
    ];


    public function detailPemesanans()
    {
        return $this->hasMany(DetailPemesanan::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'menu_id');
    }

    public function meja()
    {
        return $this->belongsTo(Meja::class, 'meja_id', 'meja_id');
    }

     public $timestamps = false;
}
