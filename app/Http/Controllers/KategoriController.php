<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    //Unutk menampilkan kategori
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    //untuk manmbah data kategori
    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => 'required',
        ]);

        $imageName = time().'.'.$request->file('image')->extension();  
        $request->file('image')->move(public_path('images'), $imageName);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'image' => $imageName,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // update data kategori
    public function edit($id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id_kategori)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => 'required',
    ]);

        $kategori = Kategori::findOrFail($id_kategori);

        // Jika ada gambar baru diunggah, simpan gambar baru
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();  
            $request->file('image')->move(public_path('images'), $imageName);
            $kategori->image = $imageName;
    }

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->keterangan = $request->keterangan;
        $kategori->save();

        return redirect('/kategori')->with('success', 'Kategori berhasil diupdate!');
    }

    //untuk menghapus data
    public function destroy($id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->delete();

        return redirect('/kategori')->with('success', 'Kategori berhasil dihapus!');
    }


}
