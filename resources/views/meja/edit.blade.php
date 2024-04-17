<html>
<head>
    <title>Edit Data Meja</title>
</head>
<body>
    <h1>Edit Data Meja</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('meja.update', $meja->meja_id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="nomor_meja">Nomor Meja:</label>
            <input type="text" id="nomor_meja" name="nomor_meja" value="{{ $meja->nomor_meja }}">
        </div>
        <div>
            <label for="kapasitas">Kapasitas:</label>
            <input type="text" id="kapasitas" name="kapasitas" value="{{ $meja->kapasitas }}">
        </div>
        <div>
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="kosong" {{ $meja->status == 'kosong' ? 'selected' : '' }}>Kosong</option>
                <option value="terisi" {{ $meja->status == 'terisi' ? 'selected' : '' }}>Terisi</option>
                <option value="dipesan" {{ $meja->status == 'dipesan' ? 'selected' : '' }}>Dipesan</option>
            </select>
        </div>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
