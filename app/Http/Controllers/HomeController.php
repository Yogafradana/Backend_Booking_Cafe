<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Pemesanan;
use App\Models\Review;
use App\Models\Meja;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Controller untuk menampilkan menu ==> By Frada
    public function index()
    {
        $menus = Menu::all();
        $totalPemesanan = Pemesanan::count(); // Menghitung jumlah pemesanan
        $totalUsers = User::count(); // Menghitung jumlah pengguna
        $totalMenu = Menu::count();
        $totalKategori = Kategori::count();
        $totalMeja = Meja::count();
        $totalUlasan = Review::count();
        return view('home', compact('menus', 'totalPemesanan', 'totalUsers', 'totalMenu', 'totalKategori','totalMeja', 'totalUlasan'));
    }
}
