<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/users/create.blade.php -->

<h1>Tambah Pengguna Baru</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <label for="name">Nama:</label><br>
    <input type="text" id="name" name="name"><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br>

    <label for="telepon">Telepon:</label><br>
    <input type="text" id="telepon" name="telepon"><br>

    <label for="alamat">Alamat:</label><br>
    <input type="text" id="alamat" name="alamat"><br>

    <label for="role">Role:</label><br>
    <select id="role" name="role">
        <option value="admin">Admin</option>
        <option value="pembeli">Pembeli</option>
    </select><br>

    <button type="submit">Tambah</button>
</form>

</body>
</html>