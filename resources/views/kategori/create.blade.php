<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori Baru</title>
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
                                        <h1 class="h4 text-gray-900 mb-4">Tambah Kategori Baru</h1>
                                    </div>
                                    <form method="POST" action="{{ route('kategori.store') }}" enctype="multipart/form-data" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nama_kategori">Nama Kategori:</label>
                                            <input type="text" class="form-control form-control-user" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}">
                                            @error('nama_kategori')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Gambar:</label>
                                            <input type="file" class="form-control-file form-control-user" id="image" name="image">
                                            @error('image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan:</label>
                                            <textarea class="form-control form-control-user" id="keterangan" name="keterangan">{{ old('keterangan') }}</textarea>
                                            @error('keterangan')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ url('/kategori') }}" class="btn btn-secondary btn-user btn-block">Kembali</a>
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

    <!-- Bootstrap core JavaScript -->
    <script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript -->
    <script src="{{ url('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages -->
    <script src="{{ url('assets/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
