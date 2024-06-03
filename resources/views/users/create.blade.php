@include('layouts.sidebar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 90%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .form-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .column {
            width: 48%;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group-button {
            display: flex;
            justify-content: flex-end;
            width: 100%;
            margin-top: 20px;
        }

        .form-group-button button,
        .form-group-button a {
            margin-left: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        .form-group-button button.submit {
            background-color: brown;
            color: white;
        }

        .form-group-button a.cancel {
            background-color: #ccc;
            color: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <form class="user" method="POST" action="{{ route('users.store') }}" style="width: 100%;">
            @csrf
            <div class="form-container">
                <div class="column">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="column">
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" id="telepon" name="telepon" placeholder="Telepon" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" id="alamat" name="alamat" placeholder="Alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select id="role" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="pembeli">Pembeli</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group-button">
                <a href="{{ route('users.index') }}" class="cancel">Cancel</a>
                <button type="submit" class="submit">Submit</button>
            </div>
        </form>
    </div>

@include('layouts.footer')
</body>

</html>
