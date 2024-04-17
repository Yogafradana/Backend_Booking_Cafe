<?php

namespace App\Http\Controllers\API;

use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return response()->json($kategori);
    }

    public function show($id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            return response()->json(['message' => 'Kategori not found'], 404);
        }
        return response()->json($kategori);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => 'required',
        ]);

        $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();  
        $request->file('image')->move(public_path('images'), $imageName);

        $kategori = Kategori::create([
            'nama_kategori' => $validatedData['nama_kategori'],
            'image' => $imageName,
            'keterangan' => $validatedData['keterangan'],
        ]);

        return response()->json(['message' => 'Kategori created', 'kategori' => $kategori], 201);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            return response()->json(['message' => 'Kategori not found'], 404);
        }

        $validatedData = $request->validate([
            'nama_kategori' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();  
            $request->file('image')->move(public_path('images'), $imageName);
            $kategori->image = $imageName;
        }

        $kategori->nama_kategori = $validatedData['nama_kategori'];
        $kategori->keterangan = $validatedData['keterangan'];
        $kategori->save();

        return response()->json(['message' => 'Kategori updated', 'kategori' => $kategori]);
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            return response()->json(['message' => 'Kategori not found'], 404);
        }

        $kategori->delete();
        return response()->json(['message' => 'Kategori deleted']);
    }
}
