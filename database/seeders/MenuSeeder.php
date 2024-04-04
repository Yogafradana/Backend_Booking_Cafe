<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Menu::create([
            'nama_menu' => 'Menu 1',
            'deskripsi' => 'Deskripsi Menu 1',
            'harga' => 10000,
            'gambar' => 'menu1.jpg',
            'id_kategori' => 1, // Sesuaikan dengan id_kategori yang ada di tabel kategori
        ]);

        Menu::create([
            'nama_menu' => 'Menu 2',
            'deskripsi' => 'Deskripsi Menu 2',
            'harga' => 15000,
            'gambar' => 'menu2.jpg',
            'id_kategori' => 2, // Sesuaikan dengan id_kategori yang ada di tabel kategori
        ]);

        // Tambahkan data dummy lainnya sesuai kebutuhan
    }
}
