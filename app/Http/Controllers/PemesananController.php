<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Meja;
use App\Models\Menu;
use Illuminate\Validation\Rule;

class PemesananController extends Controller
{

    public function index()
    {
        $pemesanans = pemesanan::with('menu', 'meja')->get();

        return view('pemesanan.index', compact('pemesanans'));
    }

    public function create()
    {
        $mejas = Meja::where('status', 'kosong')->get();
        $menus = Menu::all();
        return view('pemesanan.create', compact('mejas', 'menus'));
    }

    public function edit($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $mejas = Meja::all();
        $menus = Menu::all();
        return view('pemesanan.edit', compact('pemesanan', 'mejas', 'menus'));
    }

    public function store(Request $request)
{
    // Validasi data pemesanan
    $validatedData = $request->validate([
        'nama_pengunjung' => 'required|max:255',
        'meja_id' => [
            'required',
            'exists:meja,meja_id',
            function ($attribute, $value, $fail) {
                // Cek apakah meja tersedia (status 'kosong')
                $meja = Meja::find($value);
                if (!$meja || $meja->status !== 'kosong') {
                    $fail('Meja tidak tersedia.');
                }
            },
        ],
        'menu_id' => 'required|exists:menu,menu_id',
        'jumlah' => 'required|integer|min:1',
        'subtotal' => 'required|integer|min:0',
    ]);

    // Buat pemesanan jika validasi berhasil
    $pemesanan = Pemesanan::create($validatedData);

    // Update status meja menjadi 'terisi'
    $meja = Meja::find($validatedData['meja_id']);
    if ($meja) {
        $meja->update(['status' => 'terisi']);
    }

    return redirect()->route('pemesanan.index')
                     ->with('success', 'Pemesanan berhasil ditambahkan.');
}

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nama_pengunjung' => 'required|max:255',
        'meja_id' => 'required|exists:meja,meja_id',
        'menu_id' => 'required|exists:menu,menu_id',
        'jumlah' => 'required|integer|min:1',
        'subtotal' => 'required|integer|min:0',
        'status' => 'required|in:pending,proses,selesai',
    ]);

    // Dapatkan pemesanan berdasarkan ID
    $pemesanan = Pemesanan::findOrFail($id);

    // Simpan status pemesanan sebelum diupdate
    $oldStatus = $pemesanan->status;

    // Perbarui data pemesanan
    $pemesanan->nama_pengunjung = $validatedData['nama_pengunjung'];
    $pemesanan->meja_id = $validatedData['meja_id'];
    $pemesanan->menu_id = $validatedData['menu_id'];
    $pemesanan->jumlah = $validatedData['jumlah'];
    $pemesanan->subtotal = $validatedData['subtotal'];
    $pemesanan->status = $validatedData['status'];

    // Simpan perubahan
    $pemesanan->save();

    // Update status meja berdasarkan perubahan status pemesanan
    $meja = Meja::find($validatedData['meja_id']);
    if ($meja) {
        if ($oldStatus !== 'selesai' && $validatedData['status'] === 'selesai') {
            // Jika status pemesanan diubah menjadi 'selesai', maka status meja dikembalikan menjadi 'kosong'
            $meja->update(['status' => 'kosong']);
        } elseif ($oldStatus === 'selesai' && $validatedData['status'] !== 'selesai') {
            // Jika status pemesanan sebelumnya adalah 'selesai' dan diubah menjadi status lain, status meja diubah menjadi 'terisi'
            $meja->update(['status' => 'terisi']);
        }
    }

    return redirect()->route('pemesanan.index')
                     ->with('success', 'Pemesanan berhasil diperbarui.');
}

public function destroy($id)
{
    // Temukan pemesanan berdasarkan ID
    $pemesanan = Pemesanan::findOrFail($id);

    // Ambil meja yang terkait dengan pemesanan
    $meja = $pemesanan->meja;

    // Hapus pemesanan
    $pemesanan->delete();

    // Jika status meja yang terkait adalah 'terisi' dan tidak ada pemesanan aktif lagi untuk meja tersebut, ubah statusnya menjadi 'kosong'
    if ($meja && $meja->status === 'terisi' && $meja->pemesanans()->count() === 0) {
        $meja->update(['status' => 'kosong']);
    }

    return redirect()->route('pemesanan.index')
                     ->with('success', 'Pemesanan berhasil dihapus.');
}
}
