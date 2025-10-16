<!DOCTYPE html>
<html lang="en">
@extends('admin.layouts.base')
@section('title', 'Indeks Keseluruhan')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">

</head>

<body>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">@if($selectedProdi)
            {{ 'Indeks Data ' . $selectedProdi }}
            @else
            Indeks Data Keseluruhan Responden
            @endif
        </h1>


        <!-- Row for Total Data and Summary -->
        <div class="row">
            <!-- Total Data Cards -->
            <div class="col-xl-12 col-lg-12">
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total
                                            Data
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            @if($selectedProdi)
                                            {{ $alumniDatafilter + $tendikDatafilter + $mahasiswaDatafilter }}
                                            @else
                                            {{ $mitraData + $alumniData + $tendikData + $mahasiswaData + $penggunalulusanData + $totalDosen }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card 1 -->
                    <div class="col-md-3 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mitra
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">@if($selectedProdi)
                                            0
                                            @else
                                            {{ $mitraData }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col-md-3 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Alumni
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">@if(!$selectedProdi)
                                            {{ $alumniData }}
                                            @elseif($selectedProdi && $alumniDatafilter > 0)
                                            {{ $alumniDatafilter }}
                                            @elseif($selectedProdi && $alumniDatafilter <= 0)
                                                0
                                                @endif
                                                </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="col-md-3 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tenaga
                                                Kependidikan
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">@if(!$selectedProdi)
                                                {{ $tendikData }}
                                                @elseif($selectedProdi && $tendikDatafilter > 0)
                                                {{ $tendikDatafilter }}
                                                @elseif($selectedProdi && $tendikDatafilter <= 0)
                                                    0
                                                    @endif
                                                    </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card 4 -->
                            <div class="col-md-3 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Mahasiswa
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">@if(!$selectedProdi)
                                                    {{ $mahasiswaData }}
                                                    @elseif($selectedProdi && $mahasiswaDatafilter > 0)
                                                    {{ $mahasiswaDatafilter }}
                                                    @elseif($selectedProdi && $mahasiswaDatafilter <= 0)
                                                        0
                                                        @endif
                                                        </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card 5 -->
                                <div class="col-md-3 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengguna
                                                        Lulusan
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">@if($selectedProdi)
                                                        0
                                                        @else
                                                        {{ $penggunalulusanData }}
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card 6 -->
                                <div class="col-md-3 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Dosen
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">@if(!$selectedProdi)
                                                        {{ $totalDosen }}
                                                        @elseif($selectedProdi && $dosenDatafilter > 0)
                                                        {{ $dosenDatafilter }}
                                                        @elseif($selectedProdi && $dosenDatafilter <= 0)
                                                            0
                                                            @endif
                                                            </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card 7 -->
                                    <div class="col-md-3 mb-4">
                                        @if($selectedProdi)
                                        <a href="{{ url('dashboard') }}" class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kembali ke Indeks Keseluruhan
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-power-off fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        @else
                                        <a href="{{ url('/pilihprodi') }}" class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pilih Program Studi
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        @endif
                                    </div>

                                    <!-- Card 8 -->
                                    <div class="row">
                                        <div class="col-md-12 mb-4 d-flex flex-wrap justify-content-center">
                                            <a href="{{ route('export.mitra') }}" class="btn btn-success mx-2 mb-2">
                                                <i class="fas fa-file-excel"></i> Download Data Mitra
                                            </a>
                                            <a href="{{ route('export.alumni') }}" class="btn btn-success mx-2 mb-2">
                                                <i class="fas fa-file-excel"></i> Download Data Alumni
                                            </a>
                                            <a href="{{ route('export.tendik') }}" class="btn btn-success mx-2 mb-2">
                                                <i class="fas fa-file-excel"></i> Download Data Tenaga Kependidikan
                                            </a>
                                            <a href="{{ route('export.mahasiswa') }}" class="btn btn-success mx-2 mb-2">
                                                <i class="fas fa-file-excel"></i> Download Data Mahasiswa
                                            </a>
                                            <a href="{{ route('export.penggunalulusan') }}" class="btn btn-success mx-2 mb-2">
                                                <i class="fas fa-file-excel"></i> Download Data Pengguna Lulusan
                                            </a>
                                            <a href="{{ route('export.dosen') }}" class="btn btn-success mx-2 mb-2">
                                                <i class="fas fa-file-excel"></i> Download Data Dosen
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow-lg p-4 mb-5 bg-white rounded">
                            <h1 class="mt-4">NILAI MUTU LAYANAN</h1>
                            @php
                            $indeksnilai =
                            ($u1total + $u2total + $u3total + $u4total + $u5total + $u6total + $u7total + $u8total + $u9total) / 9;
                            $indeksnilai_persen = $indeksnilai * 25;

                            // Format the values to 2 decimal places
                            $indeksnilai_formatted = number_format($indeksnilai, 2);
                            $indeksnilai_persen_formatted = number_format($indeksnilai_persen, 2);

                            // Classify the indeksnilai_persen
                            if ($indeksnilai_persen >= 88.31 && $indeksnilai_persen <= 100) {
                                $grade='A' ;
                                } elseif ($indeksnilai_persen>= 76.61 && $indeksnilai_persen <= 88.3) {
                                    $grade='B' ;
                                    } elseif ($indeksnilai_persen>= 65.0 && $indeksnilai_persen <= 76.6) {
                                        $grade='C' ;
                                        } elseif ($indeksnilai_persen>= 25.0 && $indeksnilai_persen <= 64.99) {
                                            $grade='D' ;
                                            } else {
                                            $grade='Invalid' ;
                                            }
                                            @endphp

                                            <div class="row text-center">
                                            <div class="col-md-4 mb-3">
                                                <div class="card border-left-primary shadow h-100 py-2">
                                                    <div class="card-body">
                                                        <h4 class="card-title text-primary" style="font-weight: bold;">Indeks Nilai</h4>
                                                        <p class="card-text h5" style="font-weight: bold;">{{ $indeksnilai_formatted }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <div class="card border-left-success shadow h-100 py-2">
                                                    <div class="card-body">
                                                        <h4 class="card-title text-success" style="font-weight: bold;">Indeks Nilai dalam
                                                            Persen</h4>
                                                        <p class="card-text h5" style="font-weight: bold;">{{ $indeksnilai_persen_formatted }}%
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <div class="card border-left-info shadow h-100 py-2">
                                                    <div class="card-body">
                                                        <h4 class="card-title text-info" style="font-weight: bold;">Klasifikasi Indeks</h4>
                                                        <p class="card-text h5" style="font-weight: bold;">{{ $grade }}</p>
                                                    </div>
                                                </div>
                                            </div>
                        </div>


                        <br>
                        <div class="card shadow-lg p-4 mb-5 bg-white rounded">
                            <h1 class="mt-4">HASIL PER UNSUR PERMENPAN RB NO 17. TAHUN 2017</h1>
                            <canvas id="myBarChart"></canvas>
                        </div>
                        <!-- Chart.js Script -->
                        <script>
                            // Prepare the data as a JSON string (now includes u1 to u9)
                            const dataValues = JSON.parse(
                                '[{{ $u1total }}, {{ $u2total }}, {{ $u3total }}, {{ $u4total }}, {{ $u5total }}, {{ $u6total }}, {{ $u7total }}, {{ $u8total }}, {{ $u9total }}]'
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
                                                    size: 9, // Ukuran font untuk label sumbu x
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

                        <br>

                        <div class="container">
                            <div class="card shadow-lg p-4 mb-5 bg-white rounded">
                                <h1>NILAI IKM BERDASARKAN RESPONDEN</h1>
                                <div class="row">
                                    <!-- Pie Chart for Mitra -->
                                    <div class="col-md-4">
                                        <div class="card-body">
                                            <div class="chart-pie pt-4 pb-2">
                                                <canvas id="myPieChart"></canvas>
                                            </div>
                                            <div class="mt-4 text-center small">
                                                @php
                                                // Classify the mitraavg
                                                if ($mitraavg >= 3.5324 && $mitraavg <= 4) {
                                                    $mitraavggrade='Sangat Baik' ;
                                                    } elseif ($mitraavg>= 3.0644 && $mitraavg <= 3.532) {
                                                        $mitraavggrade='Baik' ;
                                                        } elseif ($mitraavg>= 2.6 && $mitraavg <= 3.064) {
                                                            $mitraavggrade='Kurang Baik' ;
                                                            } elseif ($mitraavg>= 1.0 && $mitraavg <= 2.5996) {
                                                                $mitraavggrade='Tidak Baik' ;
                                                                } else {
                                                                $mitraavggrade='Invalid' ;
                                                                }
                                                                @endphp
                                                                <span class="mr-2">
                                                                <i class="fas fa-circle text-primary"></i> {{ $mitraavggrade }}
                                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pie Chart for Alumni -->
                                    <div class="col-md-4">
                                        <div class="card-body">
                                            <div class="chart-pie pt-4 pb-2">
                                                <canvas id="alumniPieChart"></canvas>
                                            </div>
                                            <div class="mt-4 text-center small">
                                                @php
                                                // Classify the alumniavg
                                                if ($alumniavg >= 3.5324 && $alumniavg <= 4) {
                                                    $alumniavggrade='Sangat Baik' ;
                                                    } elseif ($alumniavg>= 3.0644 && $alumniavg <= 3.532) {
                                                        $alumniavggrade='Baik' ;
                                                        } elseif ($alumniavg>= 2.6 && $alumniavg <= 3.064) {
                                                            $alumniavggrade='Kurang Baik' ;
                                                            } elseif ($alumniavg>= 1.0 && $alumniavg <= 2.5996) {
                                                                $alumniavggrade='Tidak Baik' ;
                                                                } else {
                                                                $alumniavggrade='Invalid' ;
                                                                }
                                                                @endphp
                                                                <span class="mr-2">
                                                                <i class="fas fa-circle text-primary"></i> {{ $alumniavggrade }}
                                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pie Chart for Tendik -->
                                    <div class="col-md-4">
                                        <div class="card-body">
                                            <div class="chart-pie pt-4 pb-2">
                                                <canvas id="tendikPieChart"></canvas>
                                            </div>
                                            <div class="mt-4 text-center small">
                                                @php
                                                // Classify the tendikavg
                                                if ($tendikavg >= 3.5324 && $tendikavg <= 4) {
                                                    $tendikavggrade='Sangat Baik' ;
                                                    } elseif ($tendikavg>= 3.0644 && $tendikavg <= 3.532) {
                                                        $tendikavggrade='Baik' ;
                                                        } elseif ($tendikavg>= 2.6 && $tendikavg <= 3.064) {
                                                            $tendikavggrade='Kurang Baik' ;
                                                            } elseif ($tendikavg>= 1.0 && $tendikavg <= 2.5996) {
                                                                $tendikavggrade='Tidak Baik' ;
                                                                } else {
                                                                $tendikavggrade='Invalid' ;
                                                                }
                                                                @endphp
                                                                <span class="mr-2">
                                                                <i class="fas fa-circle text-primary"></i> {{ $tendikavggrade }}
                                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Pie Chart for Mahasiswa -->
                                    <div class="col-md-4">
                                        <div class="card-body">
                                            <div class="chart-pie pt-4 pb-2">
                                                <canvas id="mahasiswaPieChart"></canvas>
                                            </div>
                                            <div class="mt-4 text-center small">
                                                @php
                                                // Classify the mahasiswaavg
                                                if ($mahasiswaavg >= 3.5324 && $mahasiswaavg <= 4) {
                                                    $mahasiswaavggrade='Sangat Baik' ;
                                                    } elseif ($mahasiswaavg>= 3.0644 && $mahasiswaavg <= 3.532) {
                                                        $mahasiswaavggrade='Baik' ;
                                                        } elseif ($mahasiswaavg>= 2.6 && $mahasiswaavg <= 3.064) {
                                                            $mahasiswaavggrade='Kurang Baik' ;
                                                            } elseif ($mahasiswaavg>= 1.0 && $mahasiswaavg <= 2.5996) {
                                                                $mahasiswaavggrade='Tidak Baik' ;
                                                                } else {
                                                                $mahasiswaavggrade='Invalid' ;
                                                                }
                                                                @endphp
                                                                <span class="mr-2">
                                                                <i class="fas fa-circle text-primary"></i> {{ $mahasiswaavggrade }}
                                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pie Chart for Pengguna Lulusan -->
                                    <div class="col-md-4">
                                        <div class="card-body">
                                            <div class="chart-pie pt-4 pb-2">
                                                <canvas id="penggunaLulusanPieChart"></canvas>
                                            </div>
                                            <div class="mt-4 text-center small">
                                                @php
                                                // Classify the penggunalulusanavg
                                                if ($penggunalulusanavg >= 3.5324 && $penggunalulusanavg <= 4) {
                                                    $penggunalulusanavggrade='Sangat Baik' ;
                                                    } elseif ($penggunalulusanavg>= 3.0644 && $penggunalulusanavg <= 3.532) {
                                                        $penggunalulusanavggrade='Baik' ;
                                                        } elseif ($penggunalulusanavg>= 2.6 && $penggunalulusanavg <= 3.064) {
                                                            $penggunalulusanavggrade='Kurang Baik' ;
                                                            } elseif ($penggunalulusanavg>= 1.0 && $penggunalulusanavg <= 2.5996) {
                                                                $penggunalulusanavggrade='Tidak Baik' ;
                                                                } else {
                                                                $penggunalulusanavggrade='Invalid' ;
                                                                }
                                                                @endphp
                                                                <span class="mr-2">
                                                                <i class="fas fa-circle text-primary"></i> {{ $penggunalulusanavggrade }}
                                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pie Chart for Dosen -->
                                    <div class="col-md-4">
                                        <div class="card-body">
                                            <div class="chart-pie pt-4 pb-2">
                                                <canvas id="dosenPieChart"></canvas>
                                            </div>
                                            <div class="mt-4 text-center small">
                                                @php
                                                // Classify the dosenavg
                                                if ($dosenavg >= 3.5324 && $dosenavg <= 4) {
                                                    $dosenavggrade='Sangat Baik' ;
                                                    } elseif ($dosenavg>= 3.0644 && $dosenavg <= 3.532) {
                                                        $dosenavggrade='Baik' ;
                                                        } elseif ($dosenavg>= 2.6 && $dosenavg <= 3.064) {
                                                            $dosenavggrade='Kurang Baik' ;
                                                            } elseif ($dosenavg>= 1.0 && $dosenavg <= 2.5996) {
                                                                $dosenavggrade='Tidak Baik' ;
                                                                } else {
                                                                $dosenavggrade='Invalid' ;
                                                                }
                                                                @endphp
                                                                <span class="mr-2">
                                                                <i class="fas fa-circle text-primary"></i> {{ $dosenavggrade }}
                                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>


                                    </div>
                                </div>

                                <script>
                                    // Pie chart scripts for each respondent
                                    var ctx = document.getElementById("myPieChart");
                                    var myPieChart = new Chart(ctx, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ["Mitra"],
                                            datasets: [{
                                                data: [JSON.parse('{{ json_encode($mitraavg) }}'), JSON.parse(
                                                    '{{ json_encode(4 - $mitraavg) }}')],
                                                backgroundColor: ['#00B9AD', '#CDDC29'], // Primary colors
                                                hoverBackgroundColor: ['#2CD1C5', '#E0E96D'], // Lighter shades

                                                hoverBorderColor: "rgba(234, 236, 244, 1)"
                                            }],
                                        },
                                        options: {
                                            maintainAspectRatio: false,
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
                                            legend: {
                                                display: false
                                            },
                                            cutoutPercentage: 80,
                                        },
                                    });

                                    // Repeat similar script initialization for other charts with their respective variables: alumniPieChart, tendikPieChart, mahasiswaPieChart, penggunaLulusanPieChart, dosenPieChart
                                </script>

                                <script>
                                    // Pie Chart for Alumni
                                    var ctxAlumni = document.getElementById("alumniPieChart");
                                    var alumniPieChart = new Chart(ctxAlumni, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ["Alumni"],
                                            datasets: [{
                                                data: [JSON.parse('{{ json_encode($alumniavg) }}'), JSON.parse(
                                                    '{{ json_encode(4 - $alumniavg) }}')],
                                                backgroundColor: ['#4e73df', '#36b9cc'],
                                                hoverBackgroundColor: ['#2e59d9', '#2c9faf'],
                                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                                            }],
                                        },
                                        options: {
                                            maintainAspectRatio: false,
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
                                            legend: {
                                                display: false
                                            },
                                            cutoutPercentage: 80,
                                        },
                                    });
                                </script>

                                <script>
                                    // Pie Chart for Tendik
                                    var ctxTendik = document.getElementById("tendikPieChart");
                                    var tendikPieChart = new Chart(ctxTendik, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ["Tenaga Kependidikan"],
                                            datasets: [{
                                                data: [JSON.parse('{{ json_encode($tendikavg) }}'), JSON.parse(
                                                    '{{ json_encode(4 - $tendikavg) }}')],
                                                backgroundColor: ['#00B9AD', '#CDDC29'], // Primary colors
                                                hoverBackgroundColor: ['#2CD1C5', '#E0E96D'], // Lighter shades

                                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                                            }],
                                        },
                                        options: {
                                            maintainAspectRatio: false,
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
                                            legend: {
                                                display: false
                                            },
                                            cutoutPercentage: 80,
                                        },
                                    });
                                </script>

                                <script>
                                    // Pie Chart for Mahasiswa
                                    var ctxMahasiswa = document.getElementById("mahasiswaPieChart");
                                    var mahasiswaPieChart = new Chart(ctxMahasiswa, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ["Mahasiswa"],
                                            datasets: [{
                                                data: [JSON.parse('{{ json_encode($mahasiswaavg) }}'), JSON.parse(
                                                    '{{ json_encode(4 - $mahasiswaavg) }}')],
                                                backgroundColor: ['#4e73df', '#36b9cc'],
                                                hoverBackgroundColor: ['#2e59d9', '#2c9faf'],
                                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                                            }],
                                        },
                                        options: {
                                            maintainAspectRatio: false,
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
                                            legend: {
                                                display: false
                                            },
                                            cutoutPercentage: 80,
                                        },
                                    });
                                </script>

                                <script>
                                    // Pie Chart for Pengguna Lulusan
                                    var ctxPenggunaLulusan = document.getElementById("penggunaLulusanPieChart");
                                    var penggunaLulusanPieChart = new Chart(ctxPenggunaLulusan, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ["Pengguna Lulusan"],
                                            datasets: [{
                                                data: [JSON.parse('{{ json_encode($penggunalulusanavg) }}'), JSON.parse(
                                                    '{{ json_encode(4 - $penggunalulusanavg) }}')],
                                                backgroundColor: ['#00B9AD', '#CDDC29'], // Primary colors
                                                hoverBackgroundColor: ['#2CD1C5', '#E0E96D'], // Lighter shades

                                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                                            }],
                                        },
                                        options: {
                                            maintainAspectRatio: false,
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
                                            legend: {
                                                display: false
                                            },
                                            cutoutPercentage: 80,
                                        },
                                    });
                                </script>

                                <script>
                                    // Pie Chart for Dosen
                                    var ctxDosen = document.getElementById("dosenPieChart");
                                    var dosenPieChart = new Chart(ctxDosen, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ["Dosen"],
                                            datasets: [{
                                                data: [JSON.parse('{{ json_encode($dosenavg) }}'), JSON.parse(
                                                    '{{ json_encode(4 - $dosenavg) }}')],
                                                backgroundColor: ['#4e73df', '#36b9cc'],
                                                hoverBackgroundColor: ['#2e59d9', '#2c9faf'],
                                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                                            }],
                                        },
                                        options: {
                                            maintainAspectRatio: false,
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
                                            legend: {
                                                display: false
                                            },
                                            cutoutPercentage: 80,
                                        },
                                    });
                                </script>
                            </div>

                        </div>
                        <!-- End of Container Fluid -->

                        <!-- Include jQuery and Bootstrap core JavaScript -->
                        <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
                        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
                        <!-- Core plugin JavaScript-->
                        <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
                        <!-- Custom scripts for all pages-->
                        <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

                        @include('admin.layouts.footer')
                        @endsection

</body>

</html>