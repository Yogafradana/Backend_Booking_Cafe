@include('layouts.sidebar')

<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <h3 align="center">Daftar Menu</h3>
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('menus.create') }}" class="btn-brown">Add Menu</a>
                <div>
                    <form id="filterForm" method="GET" action="{{ route('menus.index') }}">
                        <select id="categoryFilter" name="kategori" class="form-select" onchange="document.getElementById('filterForm').submit();">
                            <option value="">Semua</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id_kategori }}" {{ request('kategori') == $category->id_kategori ? 'selected' : '' }}>
                                    {{ $category->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead">
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
                <tbody id="menuTableBody">
                    @foreach($menus as $menu)
                    <tr>
                        <td>{{ $menu->nama_menu }}</td>
                        <td>{{ $menu->kategori }}</td>
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
