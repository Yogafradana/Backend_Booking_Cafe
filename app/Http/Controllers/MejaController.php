<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;

class MejaController extends Controller
{
    public function index()
    {
        $mejas = Meja::all();
        return view('meja.index', compact('mejas'));
    }

    //controller tambah data meja
    public function create()
    {
        return view('meja.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_meja' => 'required|integer',
            'kapasitas' => 'required|integer',
            'status' => 'required|in:kosong,terisi,dipesan',
        ]);

        Meja::create($request->all());

        return redirect()->route('meja.index')->with('success', 'Data meja berhasil ditambahkan.');
    }

    public function edit(Meja $meja)
    {
        return view('meja.edit', compact('meja'));
    }

    public function update(Request $request, Meja $meja)
    {
        $request->validate([
            'nomor_meja' => 'required|integer',
            'kapasitas' => 'required|integer',
            'status' => 'required|in:kosong,terisi,dipesan',
        ]);

        $meja->update($request->all());

        return redirect()->route('meja.index')->with('success', 'Data meja berhasil diperbarui.');
    }

    //delete data meja
    public function destroy($meja_id)
    {
        $meja = Meja::find($meja_id);
        
        if (!$meja) {
            return redirect()->route('meja.index')->with('error', 'Data meja tidak ditemukan.');
        }
        
        $meja->delete();

        return redirect()->route('meja.index')->with('success', 'Data meja berhasil dihapus.');
    }
}
