<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pilih Kluster</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/regis.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="{{ asset('assets/img/poltekkes.jpg') }}" class="img-fluid" alt="Poltekkes Image">
                            </div>

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Pilih Peran</h1>
                                    </div>

                                    <form method="POST" action="{{ route('register.submit.cluster') }}">

                                        @csrf
                                        <div class="form-group">
                                            <label for="cluster">Sebagai</label>
                                            <select name="cluster" id="cluster" class="form-control">
                                                <option value="alumni">Alumni</option>
                                                <option value="penggunalulusan">Pengguna Lulusan</option>
                                                <option value="mahasiswa">Mahasiswa</option>
                                                <option value="tendik">Tendik</option>
                                                <option value="dosen">Dosen</option>
                                                <!-- <option value="masyarakat">Masyarakat</option> -->
                                                <option value="mitra">Mitra</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" style=" margin-bottom: 10px;">Pilih</button>
                                        <a class="btn btn-secondary btn-user" href="login" style="flex: 1; display: flex; justify-content: center; align-items: center;">Login Admin</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap core JavaScript-->
                <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
                <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

                <!-- Core plugin JavaScript-->
                <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

                <!-- Custom scripts for all pages-->
                <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
</body>

</html>