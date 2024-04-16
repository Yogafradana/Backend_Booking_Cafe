<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>
<body>
    <h1> Edit data</h1>

    <form method="POST" action="{{ route('kategori.update', $kategori->id_kategori) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label for="nama_kategori">Nama Kategori:</label><br>
        <input type="text" id="nama_kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}"><br>
    </div>

    <div>
        <label for="image">Gambar:</label><br>
        <input type="file" id="image" name="image"><br>
        @if($kategori->image)
            <img src="{{ asset('images/'.$kategori->image) }}" alt="{{ $kategori->nama_kategori }}" style="max-width: 100px;">
        @endif
    </div>

    <div>
        <label for="keterangan">Keterangan:</label><br>
        <textarea id="keterangan" name="keterangan">{{ $kategori->keterangan }}</textarea><br>
    </div>

    <button type="submit">Update</button>
</form>

</body>
</html>