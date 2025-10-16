<!DOCTYPE html>
<html lang="en">
@extends('admin.layouts.base')

@section('title', 'Form Survei Pengguna Lulusan')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/from.css') }}" rel="stylesheet">

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

</head>

<body>

    <div class="row">


        <div class="container">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="text-center">
                    <h1 class="h3 mb-4 text-gray-800">
                        Form Pengguna Lulusan
                    </h1>
                </div>
                @yield('content')
            </div>
            <form method="POST" action="{{ route('form.storepenggunalulusan') }}">
                @csrf
                <input type="hidden" name="penggunalulusan" value="{{ session('user_id') }}">

                <div style="background-color: #f0f0f0; padding: 10px; font-weight: bold;">
                    A. IDENTITAS PENILAI
                </div>
                <label for="nama">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="nama_identitaspenilai"
                    name="nama_identitaspenilai" placeholder="Nama"
                    required>

                <label for="nama">Usia (Tahun) <span class="text-danger">*</span></label>
                <input type="number" class="form-control form-control-user" id="usia_identitaspenilai"
                    name="usia_identitaspenilai" placeholder="Usia"
                    required>

                <label for="nama">Jenis Kelamin <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="jeniskelamin_identitaspenilai"
                    name="jeniskelamin_identitaspenilai" required>
                    <option value="" disabled selected>Jenis Kelamin</option>
                    <option value="Laki-laki">
                        Laki-laki</option>
                    <option value="Perempuan">
                        Perempuan</option>
                </select>

                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="alamat_identitaspenilai"
                    name="alamat_identitaspenilai" placeholder="Alamat" required>

                <label for="nama">Kontak Person (HP/WA) <span class="text-danger">*</span></label>
                <input type="number" class="form-control form-control-user" id="kontak_identitaspenilai"
                    name="kontak_identitaspenilai" placeholder="Kontak Person (Email/HP/Wa)" required>

                <label for="nama">Instansi <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="instansi_identitaspenilai"
                    name="instansi_identitaspenilai" placeholder="Instansi" required>

                <label for="nama">Jabatan <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="jabatan_identitaspenilai"
                    name="jabatan_identitaspenilai" placeholder="Jabatan" required>

                <label for="nama">Lama Bekerja Dengan Lulusan(Tahun) <span class="text-danger">*</span></label>
                <input type="number" class="form-control form-control-user" id="lamabekerjadenganlulusan"
                    name="lamabekerjadenganlulusan" placeholder="Lama Bekerja Dengan Lulusan(Tahun)" required>
                <br>

                <div style="background-color: #f0f0f0; padding: 10px; font-weight: bold;">
                    B. IDENTITAS LULUSAN YANG DINILAI
                </div>
                <label for="nama">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="nama_identitaslulusan"
                    name="nama_identitaslulusan" placeholder="Nama" required>

                <label for="nama">Jenis Kelamin <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="jeniskelamin_identitaslulusan"
                    name="jeniskelamin_identitaslulusan" required>
                    <option value="" disabled selected>Jenis Kelamin</option>
                    <option value="Laki-laki">
                        Laki-laki</option>
                    <option value="Perempuan">
                        Perempuan</option>
                </select>

                <label for="nama">Jabatan <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="jabatan_identitaslulusan"
                    name="jabatan_identitaslulusan" placeholder="Jabatan" required>

                <label for="nama">Latar Belakang Pendidikan <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="latarbelakang_identitaslulusan"
                    name="latarbelakang_identitaslulusan" required>
                    <option value="" disabled selected>Latar Belakang Pendidikan</option>
                    <option value="Diploma III">
                        Diploma III</option>
                    <option value="Diploma IV/S1">
                        Diploma IV/S1</option>
                    <option value="Profesi">
                        Profesi</option>
                    <option value="S2">S2
                    </option>
                    <option value="S3">S3
                    </option>
                </select>

                <label for="nama">Total Lama Bekerja(Tahun) <span class="text-danger">*</span></label>
                <input type="number" class="form-control form-control-user" id="lamabekerja_identitaslulusan"
                    name="lamabekerja_identitaslulusan" placeholder="Lama bekerja Lulusan :" required>

                <label for="nama">Lama Bekerja di Instansi Saat Ini(Tahun) <span
                        class="text-danger">*</span></label>
                <input type="number" class="form-control form-control-user" id="lamabekerjadiinstansisaatini"
                    name="lamabekerjadiinstansisaatini" placeholder="Lama Bekerja di Instansi Saat Ini(Tahun)" required>

                <label for="nama">Saran dan Masukan</label>
                <textarea class="form-control form-control-user" id="saranmasukkan" name="saranmasukkan"
                    placeholder="Saran dan Masukan"></textarea>
                <br>
                <img src="{{ asset('assets/img/ikm.png') }}" class="img-hr" alt="Pembatas HR1"
                    style="width: 100%; height: auto;">
                <h4 style="color: black; text-align: left;">Keterangan Menilai:</h4>
                <ul>
                    <li>1: Buruk</li>
                    <li>2: Cukup</li>
                    <li>3: Baik</li>
                    <li>4: Sangat baik</li>
                </ul>

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Uraian</th>
                            <th>Tingkat Kepuasan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp <!-- Variabel untuk nomor urut -->
                        @foreach ($pertanyaanMasyarakat as $pertanyaan)
                        <tr>
                            <td>{{ $no++ }}</td> <!-- Nomor urut -->
                            <td>{{ $pertanyaan->pertanyaan }}</td> <!-- Uraian pertanyaan -->

                            <td style="text-align: center;">
                                <!-- Radio buttons untuk tingkat kepuasan -->
                                @foreach ([1, 2, 3, 4] as $value)
                                <input type="radio"
                                    id="pertanyaanu_{{ $pertanyaan->pertanyaan_id }}_{{ $value }}"
                                    name="pertanyaanu[{{ $pertanyaan->pertanyaan_id }}]"
                                    value="{{ $value }}"
                                    {{ isset($responsesu[$pertanyaan->pertanyaan_id]) && $responsesu[$pertanyaan->pertanyaan_id] == $value ? 'checked' : '' }}
                                    {{ $loop->first ? 'required' : '' }}>
                                <!-- 'required' pada radio button pertama setiap pertanyaan -->
                                <label
                                    for="pertanyaanu_{{ $pertanyaan->pertanyaan_id }}_{{ $value }}">{{ $value }}</label>
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


                <br>
                <img src="{{ asset('assets/img/skl.png') }}" class="img-hr" alt="Pembatas HR2"
                    style="width: 100%; height: auto;">


                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Uraian</th>
                            <th>Tingkat Kepuasan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp <!-- Variabel untuk nomor urut -->
                        @foreach ($pertanyaanPenggunalulusan as $pertanyaan)
                        <tr>
                            <td>{{ $no++ }}</td> <!-- Nomor urut -->
                            <td>{{ $pertanyaan->pertanyaan }}</td> <!-- Uraian pertanyaan -->

                            <td style="text-align: center;">
                                <!-- Radio buttons untuk tingkat kepuasan -->
                                @foreach ([1, 2, 3, 4] as $value)
                                <input type="radio"
                                    id="pertanyaan_{{ $pertanyaan->pertanyaan_id }}_{{ $value }}"
                                    name="pertanyaan[{{ $pertanyaan->pertanyaan_id }}]"
                                    value="{{ $value }}"
                                    {{ isset($responses[$pertanyaan->pertanyaan_id]) && $responses[$pertanyaan->pertanyaan_id] == $value ? 'checked' : '' }}
                                    {{ $value == 1 ? 'required' : '' }}>
                                <!-- Tambahkan required hanya pada radio button pertama -->
                                <label
                                    for="pertanyaan_{{ $pertanyaan->pertanyaan_id }}_{{ $value }}">{{ $value }}</label>
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


                <button type="submit" class="btn btn-primary">KIRIM</button>
            </form>
        </div>
    </div>
    </div>

    <!-- Modal Sukses -->
    <div class="modal fade" id="successModal" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Thank You</h5>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('show.bs.modal', '#successModal', function() {
                $(this).appendTo('body');
            });
            $('#successModal').modal('show');
        });
    </script>
    @endif

</body>

@include('admin.layouts.footer')
@endsection

</html>