<!DOCTYPE html>
<html lang="en">
@extends('admin.layouts.base')

@section('title', 'Form Survei Mahasiswa')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/from.css') }}" rel="stylesheet">
    <script src="{{ asset('js/validasi/validasi-mahasiswa.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
</head>

<body>
    @php
    $dataMahasiswa = session('dataMahasiswa');
    @endphp
    <div class="row">


        <div class="container">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="text-center">
                    <h1 class="h3 mb-4 text-gray-800">Form Mahasiswa</h1>
                </div>
                @yield('content')
            </div>
            <form method="POST" action="{{ route('form.storemahasiswa') }}">
                @csrf
                <input type="hidden" name="mahasiswa" value="{{ session('user_id') }}">
                <input type="hidden" name="email" value="{{ old('email', optional($dataMahasiswa)->email) }}">

                <label for="nama">Nama <span class="text-danger">*</span> <span><small id="nama-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="text" class="form-control form-control-user" id="nama" name="nama"
                    placeholder="Nama" value="{{ old('nama', optional($dataMahasiswa)->nama) }}" required>

                <label for="nim">Nomor Induk Mahasiswa <span class="text-danger">*</span> <span><small id="nim-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="text" class="form-control form-control-user" id="nim" name="nim"
                    placeholder="Nomor Induk Mahasiswa" value="{{ old('nim', optional($dataMahasiswa)->nim) }}" required>

                <label for="usia">Usia (Tahun) <span class="text-danger">*</span> <span><small id="usia-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="number" class="form-control form-control-user" id="usia" name="usia"
                    placeholder="Usia" value="{{ old('usia', optional($dataMahasiswa)->usia) }}" required>


                <label for="jeniskelamin">Jenis Kelamin <span class="text-danger">*</span> <span><small id="jeniskelamin-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <select class="form-control form-control-user" id="jeniskelamin" name="jeniskelamin" required>
                    <option value="" disabled {{ old('jeniskelamin', optional($dataMahasiswa)->jeniskelamin) ? '' : 'selected' }}>
                        Pilih Jenis Kelamin
                    </option>
                    <option value="Laki-laki"
                        {{ old('jeniskelamin', optional($dataMahasiswa)->jeniskelamin) == 'Laki-laki' ? 'selected' : '' }}>
                        Laki-laki
                    </option>
                    <option value="Perempuan"
                        {{ old('jeniskelamin', optional($dataMahasiswa)->jeniskelamin) == 'Perempuan' ? 'selected' : '' }}>
                        Perempuan
                    </option>
                </select>

                <label for="alamat">Alamat <span class="text-danger">*</span> <span><small id="alamat-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="text" class="form-control form-control-user" id="alamat" name="alamat"
                    placeholder="Alamat" value="{{ old('alamat', optional($dataMahasiswa)->alamat) }}" required>

                <label for="nomor_telepon">Nomor Telepon <span class="text-danger">*</span> <span><small id="nomor_telepon-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="number" class="form-control form-control-user" id="nomor_telepon" name="nomor_telepon"
                    placeholder="Nomor Telepon" value="{{ old('nomor_telepon', optional($dataMahasiswa)->nomor_telepon) }}" required>

                <label for="prodi">Program Studi <span class="text-danger">*</span> <span><small id="prodi-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <select class="form-control form-control-user" id="prodi" name="prodi" required>
                    <option value="" disabled {{ old('prodi', optional($dataMahasiswa)->prodi) ? '' : 'selected' }}>
                        Pilih Program Studi
                    </option>
                    @foreach ($programStudi as $jurusan => $prodis)
                    <optgroup label="{{ $jurusan }}">
                        @foreach ($prodis as $prodi)
                        <option value="{{ $prodi }}"
                            {{ old('prodi', optional($dataMahasiswa)->prodi) == $prodi ? 'selected' : '' }}>
                            {{ $prodi }}
                        </option>
                        @endforeach
                    </optgroup>
                    @endforeach
                </select>

                <label for="saranmasukkan">Saran dan Masukan</label> <span><small id="saranmasukkan-count" class="text-muted">0 / 255 karakter</small></span> <span><small id="saranmasukkan-error" class="invalid-feedback" style="display:none;"></small>
                </span>
                <textarea class="form-control form-control-user" id="saranmasukkan" name="saranmasukkan"
                    placeholder="Saran dan Masukan" value="{{ old('saranmasukkan', optional($dataMahasiswa)->saranmasukkan) }}"></textarea>

                <br />
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

                <table></table>
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
                        @foreach ($pertanyaanMahasiswa as $pertanyaan)
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
                                <!-- Tambahkan required hanya di radio pertama -->
                                <label
                                    for="pertanyaan_{{ $pertanyaan->pertanyaan_id }}_{{ $value }}">{{ $value }}</label>
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
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