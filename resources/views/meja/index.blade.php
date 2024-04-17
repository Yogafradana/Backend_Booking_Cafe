<html>
<head>
    <title>Data Meja</title>
</head>
<body>
    <h1>Data Meja</h1>
     <a href="{{ route('meja.create') }}">Tambah Data Meja</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nomor Meja</th>
            <th>Kapasitas</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach($mejas as $meja)
        <tr>
            <td>{{ $meja->meja_id }}</td>
            <td>{{ $meja->nomor_meja }}</td>
            <td>{{ $meja->kapasitas }}</td>
            <td>{{ $meja->status }}</td>
            <td>
                <a href="{{ route('meja.edit', $meja->meja_id) }}">Edit</a>
                <form method="POST" action="{{ route('meja.destroy', $meja->meja_id) }}" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Anda yakin ingin menghapus data meja ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
