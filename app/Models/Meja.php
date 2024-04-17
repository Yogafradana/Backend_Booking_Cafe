<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    protected $table = 'Meja'; //Nama tabel
    protected $primaryKey = 'meja_id';
    protected $fillable = ['nomor_meja', 'kapasitas', 'status']; // Nama atribut pada tabael meja
}
