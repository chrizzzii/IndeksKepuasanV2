<!DOCTYPE html>
<html lang="en">

@extends('admin.layouts.base')
@section('title', 'Index Mitra Kerjasama')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">

</head>

<body>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Indeks Mitra Kerjasama</h1>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total
                                            Data Mitra Kerjasama Keseluruhan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mitraData }}</div>
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

        <br>
        <div class="card shadow-lg p-4 mb-5 bg-white rounded">
            <h1 class="mt-4">HASIL PER UNSUR PERMENPAN RB NO 17. TAHUN 2017</h1>
            <canvas id="myBarChart"></canvas>
        </div>
        <script>
            // Prepare the data as a JSON string (now includes u1 to u9)
            const dataValues = JSON.parse(
                '[{{ $mitraU1 }}, {{ $mitraU2 }}, {{ $mitraU3 }}, {{ $mitraU4 }}, {{ $mitraU5 }}, {{ $mitraU6 }}, {{ $mitraU7 }}, {{ $mitraU8 }}, {{ $mitraU9 }}]'
            );

            // Data object for the chart
            const data = {
                labels: ['PERSYARATAN', 'SISTEM, MEKANISME, DAN PROSEDUR', 'WAKTU PENYELESAIAN', 'BIAYA/TARIF', 'PRODUK SPESIFIKASI JENIS PELAYANAN', 'KOMPETENSI PELAKSANA', 'PERILAKU PELAKSANA', 'PENANGANAN PENGADUAN, SARAN DAN MASUKAN', 'SARANA DAN PRASARANA'], // Labels for your chart
                datasets: [{
                    label: 'Total',
                    data: dataValues, // Use the parsed data array
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(201, 203, 207, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(201, 203, 207, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 2 // Set border width for each bar
                }]
            };

            // Configuration for the horizontal bar chart
            const config = {
                type: 'bar',
                data, // Using the data object defined above
                options: {
                    indexAxis: 'y', // Set the index axis to 'y' for horizontal bars
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right', // Position of the legend
                        },
                        title: {
                            display: true,
                            // text: 'Chart.js Horizontal Bar Chart' // Title of the chart
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true, // Start x-axis at 0
                            max: 4, // Adjust the maximum x value
                            ticks: {
                                font: {
                                    size: 12, // Ukuran font untuk label sumbu x
                                    family: 'Arial, sans-serif' // Jenis font
                                }
                            }
                        },
                        y: {
                            beginAtZero: true, // Start y-axis at 0
                            ticks: {
                                font: {
                                    size: 10, // Ukuran font untuk label sumbu x
                                    family: 'Arial, sans-serif' // Jenis font
                                }
                            }
                        }
                    }
                }
            };

            // Render the chart
            var ctx = document.getElementById('myBarChart').getContext('2d');
            var myBarChart = new Chart(ctx, config);
        </script>


    </div>

    <!-- Include jQuery and Bootstrap core JavaScript -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
    <!-- Include Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @include('admin.layouts.footer')
    @endsection
</body>

</html>