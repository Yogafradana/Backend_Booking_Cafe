<!-- resources/views/meja/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Meja</title>
</head>
<body>
    <h1>Tambah Data Meja</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('meja.store') }}">
        @csrf
        <div>
            <label for="nomor_meja">Nomor Meja:</label>
            <input type="text" id="nomor_meja" name="nomor_meja" value="{{ old('nomor_meja') }}">
        </div>
        <div>
            <label for="kapasitas">Kapasitas:</label>
            <input type="text" id="kapasitas" name="kapasitas" value="{{ old('kapasitas') }}">
        </div>
        <div>
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="kosong">Kosong</option>
                <option value="terisi">Terisi</option>
                <option value="dipesan">Dipesan</option>
            </select>
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>