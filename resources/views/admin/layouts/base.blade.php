<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>IKM - @yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/tambahan.css') }}" rel="stylesheet">

    <style>
        .bg-gradient-primary {
            background-color: #00B9AD !important;
            /* Warna hitam */
            background-image: none !important;
            /* Hapus gradasi */
        }

        .sidebar-brand-text {
            font-size: 70%;
        }

        .topbar {
            background-image: url('{{ asset(' assets/img/poltekkesheader.png') }}');
            /* Ganti dengan nama gambar Anda */
            background-size: cover;
            /* Menutupi seluruh area */
            background-position: center;
            /* Posisi gambar di tengah */
            background-repeat: no-repeat;
            /* Tidak mengulangi gambar */
            color: white;
            /* Mengatur warna teks agar terlihat jelas pada background */
        }

        .topbar .dropdown-item {
            color: white;
            /* Atur warna teks item dropdown */
        }

        .topbar .dropdown-item:hover {
            background-color: rgba(0, 0, 0, 0.5);
            /* Warna latar belakang saat hover */
        }
    </style>

    @stack('styles') <!-- Untuk menambahkan CSS khusus di halaman lain -->

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Logo -->
            <div id="logoKemenkes" class="text-center mb-2" style="border-bottom: 6px white solid;">
                <img src="{{ asset('assets/img/logokemenkes.png') }}" alt="Logo Poltekkes"
                    style="width: 100%; height: auto;">
            </div>
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-text mx-3" style="font-weight: bold;">Kepuasan Layanan dan Indeks Kepuasan
                    Masyarakat</div>
            </a>

            <!-- Divider -->
            @if (Session::get('user_role') === 'admin')
            <hr class="sidebar-divider my-0">

            <div class="sidebar-heading">
                Index Menu
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="dashboard">Indeks Keseluruhan</a>
                        <a class="collapse-item" href="/indexalumni">Indeks Alumni</a>
                        <a class="collapse-item" href="/indexdosen">Indeks Dosen</a>
                        <a class="collapse-item" href="/indexmahasiswa">Indeks Mahasiswa</a>
                        <a class="collapse-item" href="/indexmitra">Indeks Mitra Kerjasama</a>
                        <a class="collapse-item" href="/indextendik">Indeks Tendik</a>
                        <a class="collapse-item" href="/indexpengguna">Indeks Pengguna Lulusan</a>
                    </div>
                </div>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            @if (Session::get('user_role') !== 'admin')
            <div class="sidebar-heading">Form Menu</div>

            <!-- Nav Item - Forms -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-table"></i>
                    <span>Form Survei</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @if (Session::get('user_role') === 'alumni')
                        <a class="collapse-item" href="formalumni">Survei Alumni</a>
                        @endif
                        @if (Session::get('user_role') === 'dosen')
                        <a class="collapse-item" href="formdosen">Survei Dosen</a>
                        @endif
                        @if (Session::get('user_role') === 'mahasiswa')
                        <a class="collapse-item" href="formmahasiswa">Survei Mahasiswa</a>
                        @endif
                        @if (Session::get('user_role') === 'mitra')
                        <a class="collapse-item" href="formmitra">Survei Mitra Kerjasama</a>
                        @endif
                        @if (Session::get('user_role') === 'tendik')
                        <a class="collapse-item" href="formtendik">Survei Tendik</a>
                        @endif
                        @if (Session::get('user_role') === null)
                        <a class="collapse-item" href="formmasyarakat">Survei Masyarakat</a>
                        @endif
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            @endif


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
                <script>
                    document.getElementById('sidebarToggle').addEventListener('click', function() {
                        var logo = document.getElementById('logoKemenkes');
                        if (logo) {
                            logo.style.display = logo.style.display === 'none' ? 'block' : 'none';
                        }
                    });
                </script>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar (Right: User Information) -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    
                                </span> -->
                                <img class="img-profile rounded-circle" style="border: 1px #00b9ad solid;"
                                    src="{{ asset('assets/img/logopoltekkes.png') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#" style="color: black;">
                                    <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Home
                                </a> -->
                                <a class="dropdown-item" href="#" style="color: black;">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ Session::has('user_name') ? Session::get('user_name') : 'Guest' }}
                                </a>
                                <!-- <a class="dropdown-item" href="#" style="color: black;">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('/logout') }}" style="color: black;"
                                    data-toggle=" modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>

                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content') <!-- Ini adalah tempat untuk konten halaman lain -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>



        {{-- @stack('scripts') <!-- Menampung script khusus halaman lain --> --}}

</body>
</div>

</html>
{{-- <!-- Bootstrap core JavaScript-->
<!-- Core plugin JavaScript-->
<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script> --}}