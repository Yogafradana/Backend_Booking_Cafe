<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="card shadow">
    <div class="card-body">
        <h3 class="mb-4">Edit Pemesanan</h3>
        <form action="{{ route('pemesanan.update', $pemesanan->pemesanan_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_pengunjung">Nama Pengunjung</label>
                <input type="text" class="form-control" id="nama_pengunjung" name="nama_pengunjung" value="{{ $pemesanan->nama_pengunjung }}" required>
            </div>
            <div class="form-group">
                <label for="meja_id">Meja</label>
                <select class="form-control" id="meja_id" name="meja_id" required>
                    @foreach ($mejas as $meja)
                        <option value="{{ $meja->meja_id }}" {{ $meja->meja_id == $pemesanan->meja_id ? 'selected' : '' }}>{{ $meja->nomor_meja }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="menu_id">Menu</label>
                <select class="form-control" id="menu_id" name="menu_id" required>
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->menu_id }}" {{ $menu->menu_id == $pemesanan->menu_id ? 'selected' : '' }}>{{ $menu->nama_menu }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $pemesanan->jumlah }}" required>
            </div>
            <div class="form-group">
                <label for="subtotal">Subtotal</label>
                <input type="number" class="form-control" id="subtotal" name="subtotal" value="{{ $pemesanan->subtotal }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                      <option value="pending" {{ $pemesanan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                      <option value="proses" {{ $pemesanan->status == 'proses' ? 'selected' : '' }}>Proses</option>
                      <option value="selesai" {{ $pemesanan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</body>
</html>
