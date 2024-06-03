@include('layouts.sidebar')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 90%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .column {
            width: 48%;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        textarea {
            resize: vertical;
        }
        .form-group-button {
            display: flex;
            justify-content: flex-end;
            width: 100%;
            margin-top: 20px;
        }
        .form-group-button button {
            margin-left: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group-button button.submit {
            background-color: brown;
            color: white;
        }
        .form-group-button button.cancel {
            background-color: #ccc;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data" class="user" style="width: 100%;">
            @csrf
            <div class="form-container">
                <div class="column">
                    <div class="form-group">
                        <label for="namaMenu">Nama Menu</label>
                        <input type="text" id="namaMenu" name="nama_menu" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" id="harga" name="harga" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="5" required></textarea>
                    </div>
                </div>
                <div class="column">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select id="kategori" name="id_kategori" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id_kategori }}">{{ $category->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" id="stok" name="stok" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" id="gambar" name="gambar">
                    </div>
                </div>
            </div>
            <div class="form-group-button">
                <a href="{{ route('menus.index') }}" class="cancel">Cancel</a>
                <button type="submit" class="submit">Submit</button>
            </div>
        </form>
    </div>

@include('layouts.footer')
</body>
</html>
