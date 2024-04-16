<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori'; // Nama tabel sesuai dengan nama tabel di database
    protected $primaryKey = 'id_kategori'; // Primary key dari tabel
    public $timestamps = false;
    protected $fillable = ['nama_kategori', 'image', 'keterangan'];

    // Relasi dengan Menu
    public function menus()
    {
        return $this->hasMany(Menu::class, 'id_kategori');
    }

    
}