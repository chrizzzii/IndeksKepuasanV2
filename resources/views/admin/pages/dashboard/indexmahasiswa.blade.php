<!DOCTYPE html>
<html lang="en">

@extends('admin.layouts.base')
@section('title', 'Index Mahasiswa')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">

</head>

<body>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Indeks Mahasiswa</h1>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total
                                            Data Mahasiswa Keseluruhan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mahasiswaData }}</div>
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
                '[{{ $mahasiswaU1 }}, {{ $mahasiswaU2 }}, {{ $mahasiswaU3 }}, {{ $mahasiswaU4 }}, {{ $mahasiswaU5 }}, {{ $mahasiswaU6 }}, {{ $mahasiswaU7 }}, {{ $mahasiswaU8 }}, {{ $mahasiswaU9 }}]'
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

        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card shadow" style="height: 680px; width: 100%; overflow: auto;">
                <div class="card-header py-3" style="color: #FFFFFF";>
                <h6 class=" m-0 font-weight-bold
                    text-primary">Distribusi Mahasiswa per Program Studi</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="programStudiChart"
                            style="height: 600px; width: 100%; margin-bottom: 400px;"></canvas>
                        <!-- Menambah margin di bawah canvas -->
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Tabel Jurusan dan Prodi</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Jurusan</th>
                        <th>Prodi</th>
                        <th>Responden</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tableData as $data)
                    <tr>
                        <td>{{ $data['jurusan'] }}</td>
                        <td>{{ $data['prodi'] }}</td>
                        <td>{{ $data['responden'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <!-- Include jQuery and Bootstrap core JavaScript -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Include Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var prodiLabels = JSON.parse('{!! json_encode(array_keys($jumlahMahasiswaPerProdi)) !!}');
        var prodiData = JSON.parse('{!! json_encode(array_values($jumlahMahasiswaPerProdi)) !!}');

        var ctx = document.getElementById("programStudiChart");
        var programStudiChart = new Chart(ctx, {
            type: 'doughnut', // Menggunakan doughnut chart
            data: {
                labels: prodiLabels,
                datasets: [{
                    data: prodiData,
                    backgroundColor: [
                        '#4e73df', '#36b9cc', '#1cc88a', '#f6c23e', '#e74a3b',
                        '#858796', '#f8f9fc', '#5a5c69', '#ff6384', '#ffb142',
                        '#4b77be', '#c0392b', '#2ecc71', '#8e44ad', '#e67e22',
                        '#2c3e50', '#3498db', '#9b59b6', '#d35400', '#e74c3c'
                    ],
                }],
            },
            options: {
                maintainAspectRatio: false,
                cutoutPercentage: 60, // Menambah ukuran potongan dalam doughnut chart
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'right',
                        labels: {
                            boxWidth: 20,
                            padding: 10
                        }
                    }
                },
                layout: {
                    padding: {
                        bottom: 20 // Menambah padding bawah pada chart
                    }
                },
                elements: {
                    arc: {
                        borderWidth: 2,
                    }
                }
            },
        });
    </script>
    <!-- Include jQuery and Bootstrap core JavaScript -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
    @include('admin.layouts.footer')
    @endsection
</body>

</html>