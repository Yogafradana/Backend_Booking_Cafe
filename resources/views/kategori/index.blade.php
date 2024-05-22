@include('layouts.sidebar')

<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                    <h3 class="text-center">Data Kategori</h3>
                <div class="mb-3">
                    <a href="{{ route('kategori.create') }}" class="btn btn-primary">Add Category</a>
                </div>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kategori</th>
                        <th>Gambar</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
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
                            <a href="{{ route('kategori.edit', $kat->id_kategori) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form id="deleteForm{{ $kat->id_kategori }}" action="{{ route('kategori.destroy', $kat->id_kategori) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $kat->id_kategori }})">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if (confirm("Apakah Anda yakin ingin menghapus kategori ini?")) {
            document.getElementById('deleteForm'+id).submit();
        }
    }
</script>

@include('layouts.footer')
