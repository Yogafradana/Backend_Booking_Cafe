<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //controller menampilkan data menu
    public function index()
    {
        // Menggunakan Eloquent untuk ambil data Menu
        $menus = Menu::join('kategori', 'menu.id_kategori', '=', 'kategori.id_kategori')
            ->select('menu.nama_menu', 'kategori.nama_kategori as kategori', 'menu.deskripsi', 'menu.harga', 'menu.gambar', 'menu.stok')
            ->get();

        // Jika Anda juga perlu semua data Kategori, Anda bisa ambil dengan Eloquent
        $categories = Kategori::all();
        $menus = Menu::all();

        // Kirimkan data ke view
        return view('menus.index', compact('menus', 'categories'));
    }

    // public function index2()
    // {
    //     $menus = Menu::all();
    //     return view('menus.index', compact('menus'));
    // }

    public function create()
    {
        $categories = Kategori::all();
        return view('menus.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'id_kategori' => 'required|exists:kategori,id_kategori', // Validasi id_kategori yang ada di tabel Kategori
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stok' => 'required',
        ]);

        // Simpan data menu baru
        $menu = new Menu();
        $menu->nama_menu = $request->nama_menu;
        $menu->id_kategori = $request->id_kategori;
        $menu->deskripsi = $request->deskripsi;
        $menu->harga = $request->harga;
        $menu->stok = $request->stok;

        // Upload dan simpan gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('images'), $nama_gambar);
            $menu->gambar = $nama_gambar;
        }

        $menu->save();

        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan');
    }

    //controller edit data menu
    public function edit(Menu $menu)
{
    $categories = Kategori::all();
    return view('menus.edit', compact('menu', 'categories'));
}
    public function update(Request $request, Menu $menu)
{
    $request->validate([
        'nama_menu' => 'required',
        'id_kategori' => 'required',
        'deskripsi' => 'required',
        'harga' => 'required|numeric',
        'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'stok' => 'required',
    ]);

    // Upload gambar jika ada
    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
        $gambar->move(public_path('images'), $nama_gambar);
    } else {
        $nama_gambar = $menu->gambar;
    }

    // Update data menu
    $menu->nama_menu = $request->nama_menu;
    $menu->id_kategori = $request->id_kategori;
    $menu->deskripsi = $request->deskripsi;
    $menu->harga = $request->harga;
    $menu->gambar = $nama_gambar;
    $menu->stok = $request->stok;
    $menu->save();

    return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui');
}

    // controller delete data menu
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menus.index')
                         ->with('success','Menu deleted successfully');
    }
}
