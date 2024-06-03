<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPemesanan;
use App\Models\Pemesanan;
use App\Models\Meja;
use App\Models\Menu;
use Illuminate\Validation\Rule;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::with('menu', 'meja')->get();
        return view('pemesanan.index', compact('pemesanans'));
    }

    public function create()
    {
        $menus = Menu::all();
        $mejas = Meja::all();
        return view('pemesanan.create', compact('menus', 'mejas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengunjung' => 'required|string|max:255',
            'meja_id' => 'required|exists:mejas,id',
            'menu' => 'required|array|min:1', // minimal harus ada satu menu
            'menu.*.menu_id' => 'required|exists:menus,id',
            'menu.*.jumlah' => 'required|integer|min:1',
            'menu.*.subtotal' => 'required|numeric|min:0',
        ]);

        $pemesanan = Pemesanan::create([
            'nama_pengunjung' => $request->nama_pengunjung,
            'meja_id' => $request->meja_id,
            'status' => 'pending', // Atur status default di sini
            'keterangan' => $request->keterangan ?? null,
        ]);

        foreach ($request->menu as $detail) {
            DetailPemesanan::create([
                'pemesanan_id' => $pemesanan->id,
                'menu_id' => $detail['menu_id'],
                'subtotal' => $detail['subtotal'],
                'jumlah' => $detail['jumlah']
            ]);
        }

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil dibuat.');
    }
}
