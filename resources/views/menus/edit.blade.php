<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
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
                                        <h1 class="h4 text-gray-900 mb-4">Edit Menu</h1>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('menus.update', $menu->menu_id) }}" method="POST" enctype="multipart/form-data" class="user">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="nama_menu">Nama Menu:</label>
                                            <input type="text" class="form-control form-control-user" id="nama_menu" name="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kategori">Kategori:</label>
                                            <select class="form-control form-control-user" id="id_kategori" name="id_kategori" required>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id_kategori }}" {{ $category->id_kategori == $menu->id_kategori ? 'selected' : '' }}>{{ $category->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi:</label>
                                            <textarea class="form-control form-control-user" id="deskripsi" name="deskripsi">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Harga:</label>
                                            <input type="text" class="form-control form-control-user" id="harga" name="harga" value="{{ old('harga', $menu->harga) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar">Gambar:</label>
                                            <input type="file" class="form-control-file form-control-user" id="gambar" name="gambar">
                                        </div>
                                        <div class="form-group">
                                            <img src="{{ asset('images/' . $menu->gambar) }}" alt="{{ $menu->nama_menu }}" width="100">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ route('menus.index') }}" class="btn btn-secondary btn-user btn-block">Kembali</a>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
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

    <!-- Bootstrap core JavaScript -->
    <script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript -->
    <script src="{{ url('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages -->
    <script src="{{ url('assets/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
