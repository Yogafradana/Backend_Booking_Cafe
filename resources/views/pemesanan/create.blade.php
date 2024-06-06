@include('layouts.sidebar')

@section('content')
<div class="container">
    <h2>Buat Pemesanan Baru</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pemesanan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_pengunjung">Nama Pengunjung:</label>
            <input type="text" class="form-control" id="nama_pengunjung" name="nama_pengunjung" value="{{ old('nama_pengunjung') }}" required>
        </div>

        <div class="form-group">
            <label for="meja_id">Pilih Meja:</label>
            <select class="form-control" id="meja_id" name="meja_id" required>
                @foreach($mejas as $meja)
                    <option value="{{ $meja->meja_id }}">{{ $meja->nomor_meja }} (Kapasitas: {{ $meja->kapasitas }})</option>
                @endforeach
            </select>
        </div>

        <h4>Detail Pemesanan</h4>
        <div id="menu-items">
            <div class="menu-item form-group">
                <label for="menu[0][menu_id]">Pilih Menu:</label>
                <select class="form-control menu-select" name="menu[0][menu_id]" required>
                    @foreach($menus as $menu)
                        <option value="{{ $menu->menu_id }}" data-harga="{{ $menu->harga }}">{{ $menu->nama_menu }} (Stok: {{ $menu->stok }}) - Rp{{ number_format($menu->harga, 0, ',', '.') }}</option>
                    @endforeach
                </select>

                <label for="menu[0][jumlah]">Jumlah:</label>
                <input type="number" class="form-control jumlah-input" name="menu[0][jumlah]" value="1" required>

                <label for="menu[0][subtotal]">Subtotal:</label>
                <input type="number" class="form-control subtotal-input" name="menu[0][subtotal]" value="0" required readonly>

                <label for="menu[0][keterangan]">Keterangan:</label>
                <textarea class="form-control" name="menu[0][keterangan]"></textarea>
            </div>
        </div>
        <button type="button" id="add-menu-item" class="btn btn-secondary">Tambah Menu</button>

        <button type="submit" class="btn btn-primary">Buat Pemesanan</button>
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
        <select class="form-control menu-select" name="menu[${newIndex}][menu_id]" required>
            @foreach($menus as $menu)
                <option value="{{ $menu->menu_id }}" data-harga="{{ $menu->harga }}">{{ $menu->nama_menu }} (Stok: {{ $menu->stok }}) - Rp{{ number_format($menu->harga, 0, ',', '.') }}</option>
            @endforeach
        </select>

        <label for="menu[${newIndex}][jumlah]">Jumlah:</label>
        <input type="number" class="form-control jumlah-input" name="menu[${newIndex}][jumlah]" value="1" required>

        <label for="menu[${newIndex}][subtotal]">Subtotal:</label>
        <input type="number" class="form-control subtotal-input" name="menu[${newIndex}][subtotal]" value="0" required readonly>

        <label for="menu[${newIndex}][keterangan]">Keterangan:</label>
        <textarea class="form-control" name="menu[${newIndex}][keterangan]"></textarea>
    `;

    menuItems.appendChild(newItem);
    addEventListeners(newItem);
});

function updateSubtotal(menuItem) {
    var harga = parseFloat(menuItem.querySelector('.menu-select option:checked').getAttribute('data-harga'));
    var jumlah = parseInt(menuItem.querySelector('.jumlah-input').value);
    var subtotal = harga * jumlah;
    menuItem.querySelector('.subtotal-input').value = subtotal;
}

function addEventListeners(menuItem) {
    var select = menuItem.querySelector('.menu-select');
    var jumlahInput = menuItem.querySelector('.jumlah-input');

    select.addEventListener('change', function() {
        updateSubtotal(menuItem);
    });

    jumlahInput.addEventListener('input', function() {
        updateSubtotal(menuItem);
    });

    // Initialize subtotal for new item
    updateSubtotal(menuItem);
}

// Add event listeners for the first menu item
document.querySelectorAll('.menu-item').forEach(function(menuItem) {
    addEventListeners(menuItem);
});
</script>
@include('layouts.footer')
