@include('layouts.sidebar')
<!DOCTYPE html>
<html>
<head>
    <title>Detail Pesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <style>
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
        }
        .detail-title {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .detail-item {
            margin-bottom: 10px;
        }
        .menu-item {
            display: flex;
            justify-content: space-between;
        }
        .total {
            font-weight: bold;
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        .status-dropdown {
            margin-top: 20px;
        }
        .btn-custom {
            margin-top: 20px;
        }
        .btn-save {
            background-color: #b76e2b;
            color: #fff;
        }
        .btn-back {
            background-color: #6c757d;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="detail-title">Detail Pesanan</div>
        <div class="detail-item"><strong>ID Pesanan :</strong> {{ $pemesanan->pemesanan_id }}</div>
        <div class="detail-item"><strong>Nama :</strong> {{ $pemesanan->nama_pengunjung }}</div>
        <div class="detail-item"><strong>Nomor Meja :</strong> {{ $pemesanan->meja->nomor_meja }}</div>
        <div class="detail-item"><strong>Waktu :</strong> {{ $pemesanan->tanggal_pemesanan }}</div>

        <div class="menu-item mt-4">
            <strong>Menu Pesanan</strong>
        </div>
        <div class="menu-item">
            <span>Jumlah</span>
            <span>Nama Menu</span>
            <span>Harga</span>
        </div>
        <hr />
        @foreach($pemesanan->detailPemesanans as $detail)
            <div class="menu-item">
                <span>{{ $detail->jumlah }}</span>
                <span>{{ $detail->menu->nama_menu }}</span>
                <span>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</span>
            </div>
        @endforeach
        <div class="total">
            <span>Total</span>
            <span>Rp {{ number_format($pemesanan->detailPemesanans->sum('subtotal'), 0, ',', '.') }}</span>
        </div>
        <div class="detail-item"><strong>Keterangan :</strong> {{ $pemesanan->detailPemesanans->first()->keterangan ?? '-' }}</div>

        <form action="{{ route('pemesanan.updateStatus', $pemesanan->pemesanan_id) }}" method="POST" class="status-dropdown">
            @csrf
            @method('PUT')
            <label for="status"><strong>Status</strong></label>
            <select id="status" name="status" class="form-control">
                <option value="pending" {{ $pemesanan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="proses" {{ $pemesanan->status == 'proses' ? 'selected' : '' }}>Pesanan sedang di proses</option>
                <option value="selesai" {{ $pemesanan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            <button type="submit" class="btn btn-save">Simpan</button>
        </form>

        <div class="btn-custom">
            <a href="{{ route('pemesanan.index') }}" class="btn btn-back">Kembali</a>
            <form action="{{ route('pemesanan.destroy', $pemesanan->pemesanan_id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pemesanan ini?')">Hapus</button>
            </form>
        </div>
    </div>
</body>
@include('layouts.footer')
</html>
