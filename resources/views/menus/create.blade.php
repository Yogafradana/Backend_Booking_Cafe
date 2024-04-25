<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
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
                                        <h2 class="h4 text-gray-900 mb-4">Tambah Menu</h2>
                                    </div>
                                    <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nama_menu">Nama Menu:</label>
                                            <input type="text" class="form-control form-control-user" id="nama_menu" name="nama_menu" required>
                                        </div>
                                        <div class="form-group" id="kategori_column">
                                            <label for="id_kategori">Kategori:</label>
                                            <select class="form-control form-control-user" id="id_kategori" name="id_kategori">
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id_kategori }}">{{ $category->nama_kategori }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi:</label>
                                            <textarea class="form-control form-control-user" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Harga:</label>
                                            <input type="number" class="form-control form-control-user" id="harga" name="harga" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar">Gambar:</label>
                                            <input type="file" class="form-control-file form-control-user" id="gambar" name="gambar">
                                        </div>
                                        <div class="form-group">
                                            <label for="stok">Stok:</label>
                                            <input type="number" class="form-control form-control-user" id="stok" name="stok" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ route('menus.index') }}" class="btn btn-secondary btn-user btn-block">Kembali</a>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-primary btn-user btn-block">Tambah</button>
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
