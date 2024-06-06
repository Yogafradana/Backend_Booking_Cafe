@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pemesanan</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pemesanan.update', $pemesanan->pemesanan_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_pengunjung">Nama Pengunjung:</label>
            <input type="text" class="form-control" id="nama_pengunjung" name="nama_pengunjung" value="{{ old('nama_pengunjung', $pemesanan->nama_pengunjung) }}" required>
        </div>

        <div class="form-group">
            <label for="meja_id">Pilih Meja:</label>
            <select class="form-control" id="meja_id" name="meja_id" required>
                @foreach($mejas as $meja)
                    <option value="{{ $meja->meja_id }}" {{ $meja->meja_id == $pemesanan->meja_id ? 'selected' : '' }}>{{ $meja->nomor_meja }} (Kapasitas: {{ $meja->kapasitas }})</option>
                @endforeach
            </select>
        </div>

        <h4>Detail Pemesanan</h4>
        <div id="menu-items">
            @foreach($pemesanan->detailPemesanans as $index => $detail)
                <div class="menu-item form-group">
                    <label for="menu[{{ $index }}][menu_id]">Pilih Menu:</label>
                    <select class="form-control" name="menu[{{ $index }}][menu_id]" required>
                        @foreach($menus as $menu)
                            <option value="{{ $menu->menu_id }}" {{ $menu->menu_id == $detail->menu_id ? 'selected' : '' }}>{{ $menu->nama_menu }} (Stok: {{ $menu->stok }}) - Rp{{ number_format($menu->harga, 0, ',', '.') }}</option>
                        @endforeach
                    </select>

                    <label for="menu[{{ $index }}][jumlah]">Jumlah:</label>
                    <input type="number" class="form-control" name="menu[{{ $index }}][jumlah]" value="{{ old('menu.'.$index.'.jumlah', $detail->jumlah) }}" required>

                    <label for="menu[{{ $index }}][subtotal]">Subtotal:</label>
                    <input type="number" class="form-control" name="menu[{{ $index }}][subtotal]" value="{{ old('menu.'.$index.'.subtotal', $detail->subtotal) }}" required>

                    <label for="menu[{{ $index }}][keterangan]">Keterangan:</label>
                    <textarea class="form-control" name="menu[{{ $index }}][keterangan]">{{ old('menu.'.$index.'.keterangan', $detail->keterangan) }}</textarea>
                </div>
            @endforeach
        </div>
        <button type="button" id="add-menu-item" class="btn btn-secondary">Tambah Menu</button>

        <button type="submit" class="btn btn-primary">Perbarui Pemesanan</button>
    </form>
</div>

<script>
document.getElementById('add-menu-item').addEventListener('click', function() {
    var menuItems = document.getElementById('menu-items');
    var newIndex = menuItems.children.length;
    var newItem = document.createElement('div');
    newItem.classList.add('menu-item', 'form-group');

    newItem.innerHTML = `
        <label for="menu[${newIndex}][menu_id]">Pilih Menu:</label>
        <select class="form-control" name="menu[${newIndex}][menu_id]" required>
            @foreach($menus as $menu)
                <option value="{{ $menu->menu_id }}">{{ $menu->nama_menu }} (Stok: {{ $menu->stok }}) - Rp{{ number_format($menu->harga, 0, ',', '.') }}</option>
            @endforeach
        </select>

        <label for="menu[${newIndex}][jumlah]">Jumlah:</label>
        <input type="number" class="form-control" name="menu[${newIndex}][jumlah]" value="1" required>

        <label for="menu[${newIndex}][subtotal]">Subtotal:</label>
        <input type="number" class="form-control" name="menu[${newIndex}][subtotal]" value="0" required>

        <label for="menu[${newIndex}][keterangan]">Keterangan:</label>
        <textarea class="form-control" name="menu[${newIndex}][keterangan]"></textarea>
    `;

    menuItems.appendChild(newItem);
});
</script>
@endsection
