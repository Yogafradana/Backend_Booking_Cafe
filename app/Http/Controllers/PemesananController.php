<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPemesanan;
use App\Models\Pemesanan;
use App\Models\Meja;
use App\Models\Menu;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::with('detailPemesanans.menu', 'meja')->get();
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
            'meja_id' => 'required|exists:meja,meja_id',
            'menu' => 'required|array|min:1',
            'menu.*.menu_id' => 'required|exists:menu,menu_id',
            'menu.*.jumlah' => 'required|integer|min:1',
            'menu.*.subtotal' => 'required|numeric|min:0',
        ]);

        try {
            $meja = Meja::find($request->meja_id);
            if ($meja->status !== 'kosong') {
                return redirect()->back()->withErrors(['error' => 'Meja sudah dipesan atau terisi. Silakan pilih meja lain.']);
            }

            $pemesanan = Pemesanan::create([
                'nama_pengunjung' => $request->nama_pengunjung,
                'meja_id' => $request->meja_id,
                'tanggal_pemesanan' => now(),
                'status' => 'pending'
            ]);

            foreach ($request->menu as $detail) {
                $menu = Menu::find($detail['menu_id']);
                if ($menu->reduceStock($detail['jumlah'])) {
                    DetailPemesanan::create([
                        'pemesanan_id' => $pemesanan->pemesanan_id,
                        'menu_id' => $detail['menu_id'],
                        'subtotal' => $detail['subtotal'],
                        'jumlah' => $detail['jumlah'],
                        'keterangan' => $detail['keterangan'] ?? null,
                    ]);
                } else {
                    return redirect()->back()->withErrors(['error' => 'Stok menu tidak cukup untuk item: ' . $menu->nama_menu]);
                }
            }

            $meja->setStatus('dipesan');

            return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to save: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pengunjung' => 'required|string|max:255',
            'meja_id' => 'required|exists:meja,meja_id',
            'menu' => 'required|array|min:1',
            'menu.*.menu_id' => 'required|exists:menu,menu_id',
            'menu.*.jumlah' => 'required|integer|min:1',
            'menu.*.subtotal' => 'required|numeric|min:0',
        ]);

        try {
            $pemesanan = Pemesanan::findOrFail($id);
            $mejaLama = Meja::find($pemesanan->meja_id);

            $pemesanan->update([
                'nama_pengunjung' => $request->nama_pengunjung,
                'meja_id' => $request->meja_id,
                'tanggal_pemesanan' => now(),
                'status' => $request->status
            ]);

            // Hapus detail pemesanan lama dan tambahkan yang baru
            DetailPemesanan::where('pemesanan_id', $id)->delete();
            foreach ($request->menu as $detail) {
                $menu = Menu::find($detail['menu_id']);
                if ($menu->reduceStock($detail['jumlah'])) {
                    DetailPemesanan::create([
                        'pemesanan_id' => $pemesanan->pemesanan_id,
                        'menu_id' => $detail['menu_id'],
                        'subtotal' => $detail['subtotal'],
                        'jumlah' => $detail['jumlah'],
                        'keterangan' => $detail['keterangan'] ?? null,
                    ]);
                } else {
                    return redirect()->back()->withErrors(['error' => 'Stok menu tidak cukup untuk item: ' . $menu->nama_menu]);
                }
            }

            $mejaLama->setStatus('kosong');
            $mejaBaru = Meja::find($request->meja_id);
            $mejaBaru->setStatus('dipesan');

            return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update: ' . $e->getMessage()]);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,proses,selesai',
        ]);

        try {
            $pemesanan = Pemesanan::findOrFail($id);
            $pemesanan->update(['status' => $request->status]);

            if ($request->status == 'selesai') {
                $meja = Meja::find($pemesanan->meja_id);
                $meja->setStatus('kosong');
            }

            return redirect()->route('pemesanan.index')->with('success', 'Status pemesanan berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update status: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $pemesanan = Pemesanan::findOrFail($id);
            $meja = Meja::find($pemesanan->meja_id);

            DetailPemesanan::where('pemesanan_id', $id)->delete();
            $pemesanan->delete();

            $meja->setStatus('kosong');

            return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to delete: ' . $e->getMessage()]);
        }
    }
    public function show($id)
    {
        $pemesanan = Pemesanan::with('meja', 'detailPemesanans.menu')->findOrFail($id);
        return view('pemesanan.detailpemesanan', compact('pemesanan'));
    }

}

