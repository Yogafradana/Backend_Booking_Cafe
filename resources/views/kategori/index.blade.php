<html>
<head>
    <title>Data Kategori</title>
</head>
<body>
    <h1>Data Kategori</h1>
    <div>
         <!--Tambahkan link menuju halaman tambah data kategori-->
    <a href="{{ route('kategori.create') }}">Tambah Kategori</a>
    </div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Gambar</th>
            <th>Keterangan</th>
            <th>Action</th>
        </tr>
        @foreach ($kategori as $kat)
        <tr>
            <td>{{ $kat->id_kategori }}</td>
            <td>{{ $kat->nama_kategori }}</td>
            <td>
                <img src="{{ asset('images/' . $kat->image) }}" alt="{{ $kat->nama_kategori }}" width="100">
            </td>
            <td>{{ $kat->keterangan }}</td>
             <td>
            <!-- Tautan Edit -->
                <a href="{{ route('kategori.edit', $kat->id_kategori) }}">Edit</a>
                <form id="deleteForm{{ $kat->id_kategori }}" action="{{ route('kategori.destroy', $kat->id_kategori) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete({{ $kat->id_kategori }})">Delete</button>
                </form>

                <script>
                    function confirmDelete(id) {
                        if (confirm("Apakah Anda yakin ingin menghapus kategori ini?")) {
                        document.getElementById('deleteForm'+id).submit();}
                    }
                </script>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
