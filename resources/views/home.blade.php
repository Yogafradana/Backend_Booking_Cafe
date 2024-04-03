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
                <td>{{ $menu->kategori }}</td>
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
