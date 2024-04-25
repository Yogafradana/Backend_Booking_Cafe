<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Meja</title>
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
                                        <h1 class="h4 text-gray-900 mb-4">Tambah Data Meja</h1>
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
                                    <form method="POST" action="{{ route('meja.store') }}" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nomor_meja">Nomor Meja:</label>
                                            <input type="text" class="form-control form-control-user" id="nomor_meja" name="nomor_meja" value="{{ old('nomor_meja') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="kapasitas">Kapasitas:</label>
                                            <input type="text" class="form-control form-control-user" id="kapasitas" name="kapasitas" value="{{ old('kapasitas') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status:</label>
                                            <select class="form-control form-control-user" id="status" name="status">
                                                <option value="kosong">Kosong</option>
                                                <option value="terisi">Terisi</option>
                                                <option value="dipesan">Dipesan</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ route('meja.index') }}" class="btn btn-secondary btn-user btn-block">Kembali</a>
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
