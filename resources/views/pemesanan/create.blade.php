@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buat Pemesanan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pemesanans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_pengunjung">Nama Pengunjung</label>
            <input type="text" name="nama_pengunjung" class="form-control" value="{{ old('nama_pengunjung') }}">
        </div>
        <div class="form-group">
            <label for="meja_id">Meja</label>
            <select name="meja_id" class="form-control">
                <option value="">Pilih Meja</option>
                @foreach ($mejas as $meja)
                    <option value="{{ $meja->id }}" {{ old('meja_id') == $meja->id ? 'selected' : '' }}>{{ $meja->nomor_meja }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
        </div>
        <div class="form-group">
            <label for="menu">Menu</label>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="dynamic-table">
                    <tr>
                        <td>
                            <select name="menu[0][menu_id]" class="form-control" onchange="hitungSubtotal(this)">
                                <option value="">Pilih Menu</option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}" data-harga="{{ $menu->harga }}" {{ old('menu.0.menu_id') == $menu->id ? 'selected' : '' }}>{{ $menu->nama_menu }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="text" name="menu[0][harga]" class="form-control" readonly value="{{ old('menu.0.harga') }}"></td>
                        <td><input type="number" name="menu[0][jumlah]" class="form-control" value="{{ old('menu.0.jumlah') }}" onchange="hitungSubtotal(this)"></td>
                        <td><input type="text" name="menu[0][subtotal]" class="form-control" readonly value="{{ old('menu.0.subtotal') }}"></td>
                        <td><button type="button" class="btn btn-danger" onclick="hapusBaris(this)">Hapus</button></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" onclick="tambahBaris()">Tambah Menu</button>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>

<script>
    let index = 0;

    function tambahBaris() {
        index++;
        const row = `
            <tr>
                <td>
                    <select name="menu[${index}][menu_id]" class="form-control" onchange="hitungSubtotal(this)">
                        <option value="">Pilih Menu</option>
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}" data-harga="{{ $menu->harga }}">{{ $menu->nama_menu }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="text" name="menu[${index}][harga]" class="form-control" readonly></td>
                <td><input type="number" name="menu[${index}][jumlah]" class="form-control" onchange="hitungSubtotal(this)"></td>
                <td><input type="text" name="menu[${index}][subtotal]" class="form-control" readonly></td>
                <td><button type="button" class="btn btn-danger" onclick="hapusBaris(this)">Hapus</button></td>
            </tr>
        `;
        document.getElementById('dynamic-table').insertAdjacentHTML('beforeend', row);
    }

    function hapusBaris(button) {
        button.closest('tr').remove();
    }

    function hitungSubtotal(element) {
        const index = element.parentNode.parentNode.rowIndex - 1; // mendapatkan index baris
        const harga = element.options[element.selectedIndex].getAttribute('data-harga');
        const jumlah = document.querySelector(`input[name="menu[${index}][jumlah]"]`).value;
        const subtotal = harga * jumlah;

        document.querySelector(`input[name="menu[${index}][harga]"]`).value = harga;
        document.querySelector(`input[name="menu[${index}][subtotal]"]`).value = subtotal;
    }
</script>

@endsection
