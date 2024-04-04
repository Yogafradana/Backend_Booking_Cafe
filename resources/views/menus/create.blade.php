<!-- resources/views/menus/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
</head>
<body>
    <h2>Tambah Menu</h2>
    <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nama_menu">Nama Menu:</label>
        <input type="text" class="form-control" id="nama_menu" name="nama_menu" required>
    </div>
    <div class="form-group">
        <label for="id_kategori">Kategori:</label>
        <select class="form-control" id="id_kategori" name="id_kategori" required>
            @foreach($categories as $category)
                <option value="{{ $category->id_kategori }}">{{ $category->nama_kategori }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi:</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
    </div>
    <div class="form-group">
        <label for="harga">Harga:</label>
        <input type="number" class="form-control" id="harga" name="harga" required>
    </div>
    <div class="form-group">
        <label for="gambar">Gambar:</label>
        <input type="file" class="form-control-file" id="gambar" name="gambar">
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
</body>
</html>
