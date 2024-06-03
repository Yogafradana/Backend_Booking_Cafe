@include('layouts.sidebar')

<div class="card shadow">
    <div class="card-body">
        <h3 class="text-center">Data Pemesanan</h3>
        <div>
            <a href="{{ route('pemesanan.create') }}" class="btn-brown">Add Orders</a>
        </div>
        <div class="table-responsive" style="overflow-x: auto; max-height: 500px;">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="thead">
                    <tr>
                        <th>ID</th>
                        <th>Nama Pengunjung</th>
                        <th>Meja</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>More</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemesanans as $pemesanan)
                        <tr>
                            <td>{{ $pemesanan->pemesanan_id }}</td>
                            <td>{{ $pemesanan->nama_pengunjung }}</td>
                            <td>{{ $pemesanan->meja_id }}</td>
                            <td>{{ $pemesanan->tanggal_pemesanan }}</td>
                            <td>{{ $pemesanan->status }}</td>
                            <td>
                                <a href="{{ route('pemesanan.edit', $pemesanan->pemesanan_id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form method="POST" action="{{ route('pemesanan.destroy', $pemesanan->pemesanan_id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus pemesanan ini?')">Delete</button>
                                </form>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('layouts.footer')
