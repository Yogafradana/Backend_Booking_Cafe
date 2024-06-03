@include('layouts.sidebar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kategori</title>
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
            background-color: #fff;
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
        input[type="file"],
        textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            height: 100px;
        }

        img {
            max-width: 100px;
            margin-top: 10px;
        }

        .form-group-button {
            display: flex;
            justify-content: flex-end;
            width: 100%;
            margin-top: 20px;
        }

        .form-group-button button,
        .form-group-button a {
            margin-left: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        .form-group-button button.submit {
            background-color: brown;
            color: white;
        }

        .form-group-button a.cancel {
            background-color: #ccc;
            color: black;
        }

        .alert {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="POST" action="{{ route('kategori.update', $kategori->id_kategori) }}" enctype="multipart/form-data" class="user" style="width: 100%;">
            @csrf
            @method('PUT')
            <div class="form-container">
                <div class="column">
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" value="{{ $kategori->nama_kategori }}" required>
                        @error('nama_kategori')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" placeholder="Keterangan">{{ $kategori->keterangan }}</textarea>
                        @error('keterangan')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="column">
                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" id="image" name="image">
                        @if($kategori->image)
                            <img src="{{ asset('images/'.$kategori->image) }}" alt="{{ $kategori->nama_kategori }}">
                        @endif
                        @error('image')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group-button">
                <a href="{{ url('/kategori') }}" class="cancel">Kembali</a>
                <button type="submit" class="submit">Update</button>
            </div>
        </form>
    </div>
    @include('layouts.footer')
</body>

</html>
