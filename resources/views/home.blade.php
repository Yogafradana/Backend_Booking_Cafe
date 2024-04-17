<!-- resources/views/layouts/home.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<nav>
        <!-- Tombol Logout -->
    <ul>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <!-- Tambahkan link menuju halaman kategori -->
    <a href="{{ url('/kategori') }}">Lihat Kategori</a>
    <a href="{{ route('meja.index') }}">Lihat Data Meja</a>
        </li>
    </ul>
    </nav>
<body>
    
    <h1>Daftar Menu</h1>
    <a href="{{ route('menus.create') }}" style="margin-bottom: 10px; display: inline-block;">Tambah Menu</a>
    <table>
        <thead>
            <tr>
                <th>Nama Menu</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Gambar</th>
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
                <td>
                    <a href="{{ route('menus.edit', $menu->menu_id) }}">Edit</a>
                    <form action="{{ route('menus.destroy', $menu->menu_id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
