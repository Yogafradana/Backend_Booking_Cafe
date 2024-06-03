@include('layouts.sidebar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Meja</title>
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
            background-color: #fff.
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
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px.
        }

        .form-group-button {
            display: flex;
            justify-content: flex-end;
            width: 100%;
            margin-top: 20px.
        }

        .form-group-button button,
        .form-group-button a {
            margin-left: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            text-align: center.
        }

        .form-group-button button.submit {
            background-color: brown;
            color: white.
        }

        .form-group-button a.cancel {
            background-color: #ccc;
            color: black.
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="POST" action="{{ route('meja.update', $meja->meja_id) }}" class="user" style="width: 100%;">
            @csrf
            @method('PUT')
            <div class="form-container">
                <div class="column">
                    <div class="form-group">
                        <label for="nomor_meja">Nomor Meja</label>
                        <input type="text" id="nomor_meja" name="nomor_meja" placeholder="Nomor Meja" value="{{ $meja->nomor_meja }}" required>
                    </div>
                    <div class="form-group">
                        <label for="kapasitas">Kapasitas</label>
                        <input type="text" id="kapasitas" name="kapasitas" placeholder="Kapasitas" value="{{ $meja->kapasitas }}" required>
                    </div>
                </div>
                <div class="column">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" required>
                            <option value="kosong" {{ $meja->status === 'kosong' ? 'selected' : '' }}>Kosong</option>
                            <option value="terisi" {{ $meja->status === 'terisi' ? 'selected' : '' }}>Terisi</option>
                            <option value="dipesan" {{ $meja->status === 'dipesan' ? 'selected' : '' }}>Dipesan</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group-button">
                <a href="{{ route('meja.index') }}" class="cancel">Kembali</a>
                <button type="submit" class="submit">Simpan</button>
            </div>
        </form>
    </div>
    @include('layouts.footer')
</body>

</html>
