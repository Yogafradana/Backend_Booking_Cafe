<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    protected $fillable = [
        'pemesanan_id', 'menu_id', 'subtotal', 'jumlah'
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
