<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap core CSS-->
    <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ url('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Edit User</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('users.update', $user->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Nama:</label>
                                        <input type="text" class="form-control form-control-user" id="name" name="name" value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control form-control-user" id="email" name="email" value="{{ $user->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control form-control-user" id="password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon">Telepon:</label>
                                        <input type="text" class="form-control form-control-user" id="telepon" name="telepon" value="{{ $user->telepon }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat:</label>
                                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="{{ $user->alamat }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role:</label>
                                        <select class="form-control form-control-user" id="role" name="role">
                                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="pembeli" {{ $user->role === 'pembeli' ? 'selected' : '' }}>Pembeli</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ route('users.index') }}" class="btn btn-secondary btn-user btn-block">Kembali</a>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


 <!-- Bootstrap core JavaScript-->
    <script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('assets/js/sb-admin-2.min.js') }}"></script>

</body>
</html>