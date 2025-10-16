<!DOCTYPE html>
<html lang="en">
@extends('admin.layouts.base')
@section('title', 'Index Masyarakat')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    </head>

    <body>
        <div class="container-fluid content">
            <h1 class="h3 mb-4 text-gray-800">Indeks Masyarakat</h1>

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total
                                                Data Masyarakat Keseluruhan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $masyarakatData }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panggil Footer -->
        @include('admin.layouts.footer')

        <!-- Include jQuery and Bootstrap core JavaScript -->
        <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
        <!-- Include Chart.js Library -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endsection
</body>

</html>
