<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/users/edit.blade.php -->

<h1>Edit Data Pengguna</h1>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Nama:</label><br>
    <input type="text" id="name" name="name" value="{{ $user->name }}"><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value="{{ $user->email }}"><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br>

    <label for="telepon">Telepon:</label><br>
    <input type="text" id="telepon" name="telepon" value="{{ $user->telepon }}"><br>

    <label for="alamat">Alamat:</label><br>
    <input type="text" id="alamat" name="alamat" value="{{ $user->alamat }}"><br>

    <label for="role">Role:</label><br>
    <select id="role" name="role">
        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="pembeli" {{ $user->role === 'pembeli' ? 'selected' : '' }}>Pembeli</option>
    </select><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>