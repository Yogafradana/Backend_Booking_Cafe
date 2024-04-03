<!-- resources/views/menus/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Add Menu</title>
</head>
<body>
    <h2>Add Menu</h2>
    <form method="POST" action="{{ route('menus.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nama_menu">Nama Menu:</label>
            <input type="text" name="nama_menu" id="nama_menu" required>
        </div>
        <div>
            <label for="deskripsi">Deskripsi:</label>
            <textarea name="deskripsi" id="deskripsi" required></textarea>
        </div>
        <div>
            <label for="kategori">Kategori:</label>
            <input type="text" name="kategori" id="kategori" required>
        </div>
        <div>
            <label for="harga">Harga:</label>
            <input type="number" name="harga" id="harga" required>
        </div>
        <div>
            <label for="gambar">Gambar:</label>
            <input type="file" name="gambar" id="gambar" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
