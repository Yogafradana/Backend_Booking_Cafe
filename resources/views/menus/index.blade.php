@include('layouts.sidebar')

<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <h3 align="center">Daftar Menu</h3>
                <a href="{{ route('menus.create') }}" class="btn btn-primary mb-6">Add Menu</a>
                <br></br>
                <thead>
                    <tr>
                        <th>Nama Menu</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                    <tr>
                        <td>{{ $menu->nama_menu }}</td>
                        <td>
                            @if ($menu->kategori)
                                {{ $menu->kategori->nama_kategori }}
                            @else
                                Kategori tidak ditemukan
                            @endif
                        </td>
                        <td>{{ $menu->deskripsi }}</td>
                        <td>Rp {{ $menu->harga }}</td>
                        <td>
                            <img src="{{ asset('images/' . $menu->gambar) }}" alt="{{ $menu->nama_menu }}" width="100">
                        </td>
                        <td>{{ $menu->stok }}</td>
                        <td>
                            <a href="{{ route('menus.edit', $menu->menu_id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('menus.destroy', $menu->menu_id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@include('layouts.footer')
