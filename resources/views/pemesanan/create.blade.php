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
        <h3 class="mb-4">Tambah Pemesanan Baru</h3>
        <form action="{{ route('pemesanan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_pengunjung">Nama Pengunjung</label>
                <input type="text" class="form-control" id="nama_pengunjung" name="nama_pengunjung" required>
            </div>
            <div class="form-group">
                <label for="meja_id">Meja</label>
                <select class="form-control" id="meja_id" name="meja_id" required>
                    <option value="">Pilih Meja</option>
                    @foreach ($mejas as $meja)
                        <option value="{{ $meja->meja_id }}">{{ $meja->nomor_meja }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="menu_id">Menu</label>
                <select class="form-control" id="menu_id" name="menu_id" required>
                    <option value="">Pilih Menu</option>
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->menu_id }}">{{ $menu->nama_menu }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
            </div>
            <div class="form-group">
                <label for="subtotal">Subtotal</label>
                <input type="number" class="form-control" id="subtotal" name="subtotal" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

</body>
</html>
