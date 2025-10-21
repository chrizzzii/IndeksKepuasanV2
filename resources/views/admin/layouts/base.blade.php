<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>IKM - @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">


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
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
        }

        .topbar .dropdown-item {
            color: white;
        }

        .topbar .dropdown-item:hover {
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

    @stack('styles') <!-- Untuk menambahkan CSS khusus di halaman lain -->

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Logo -->
            <div id="logoKemenkes" class="text-center mb-2" style="border-bottom: 14px white solid;">
                <img src="{{ asset('assets/img/logokemenkes.png') }}" alt="Logo Poltekkes"
                    style="width: 100%; height: auto;">
            </div>
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-text mx-3" style="font-weight: bold;">Kepuasan Layanan dan Indeks Kepuasan
                    Masyarakat</div>
            </a>
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