<html>
<head>
    <title>Tambah Kategori Baru</title>
</head>
<body>
    <h1>Tambah Kategori Baru</h1>
    
    <!-- resources/views/kategori/create.blade.php -->

<form method="POST" action="{{ route('kategori.store') }}" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="nama_kategori">Nama Kategori:</label><br>
        <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}"><br>
        @error('nama_kategori')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="image">Gambar:</label><br>
        <input type="file" id="image" name="image"><br>
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="keterangan">Keterangan:</label><br>
        <textarea id="keterangan" name="keterangan">{{ old('keterangan') }}</textarea><br>
        @error('keterangan')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Simpan</button>
</form>

</body>
</html>
