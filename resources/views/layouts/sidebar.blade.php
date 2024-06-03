<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cafe XYZ Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
    .thead {
        background-color: #A86227; /* Cokelat */
        color: white;
        border-radius: 30px;
    }

     .btn-brown {
        background-color: #A86227; /* Warna cokelat */
        border-color: #A86227;
        color: white; /* Warna teks */
        padding: 10px 20px; /* Ukuran tombol lebih besar */
        font-size: 16px; /* Ukuran teks lebih besar */
        border-radius: 5px; /* Membuat sudut membulat */
        text-align: center; /* Mengatur teks di tengah */
        text-decoration: none; /* Menghapus garis bawah */
        display: inline-block; /* Membuat tombol terlihat inline */
        margin-bottom: 10px;
    }

    .btn-brown:hover {
        background-color: #A0522D; /* Warna cokelat sedikit lebih terang untuk efek hover */
        border-color: #A0522D;
    }

    .border-brown {
    border: 2px solid brown;
    padding: 5px; /* Adjust as needed */
    display: inline-block; /* Ensures the border wraps around the text */
    }

    .fa-star {
    color: yellow;}

    .thead{
        position: sticky;
    }

    .form-container {
            display: flex;
            justify-content: space-between;
        }
        .form-column {
            width: 48%;
        }
        .btn-submit {
            background-color: brown;
            color: white;
        }

</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('.nav-link').on('click', function() {
        $('.nav-link').removeClass('bg-brown'); // Remove from all links
        $(this).addClass('bg-brown'); // Add to clicked link
    });
});
</script>




</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-white sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">
                    <img src="assets/img/logo.png" alt="Logo" style="height: 60px; width: auto; margin-right: 10px;">
                </div>
            </a>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-laptop text-gray-300"></i>
                    <span style="color: Black">Dashboard</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                    <span style="color: Black">Users</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('menus.index') }}">
                    <i class="fas fa-utensils fa-2x text-gray-300"></i>
                    <span style="color: Black">Menu</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/pemesanan') }}">
                    <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                    <span style="color: Black">Pesanan</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link {{ Request::is('kategori') ? 'active bg-brown' : '' }}" href="{{ route('meja.index') }}">
                    <i class="fas fa-chair fa-2x text-gray-300"></i>
                    <span style="color: Black">Meja</span>
                </a>
            </li>


            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/kategori') }}">
                    <i class="fas fa-tags fa-2x text-gray-300"></i>
                    <span style="color: Black">Kategori</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('reviews.index') }}">
                    <i class="fas fa-comment fa-2x text-gray-300"></i>
                    <span style="color: Black">Ulasan</span></a>
            </li>
            </ul>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ url('assets/img/cafe.jpg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
    <body>
</html>
