<!-- resources/views/menus/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu</title>
</head>
<body>
    <h1>Edit Menu</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('menus.update', $menu->menu_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_menu">Nama Menu:</label>
            <input type="text" id="nama_menu" name="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}">
        </div>

        <div>
            <label for="kategori">Kategori:</label>
            <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $menu->kategori) }}">
        </div>

        <div>
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
        </div>

        <div>
            <label for="harga">Harga:</label>
            <input type="text" id="harga" name="harga" value="{{ old('harga', $menu->harga) }}">
        </div>

        <div>
            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar">
        </div>

        <div>
            <img src="{{ asset('images/' . $menu->gambar) }}" alt="{{ $menu->nama_menu }}" width="100">
        </div>

        <button type="submit">Update</button>
    </form>
</body>
</html>
