<!DOCTYPE html>
<html lang="en">
@extends('admin.layouts.base')

@section('title', 'Form Survei Dosen')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/from.css') }}" rel="stylesheet">

    <style>
        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            /* Jarak bawah */
        }

        .form-check-input {
            display: none;
            /* Sembunyikan checkbox asli */
        }

        .form-check-label {
            display: inline-block;
            padding: 10px 20px;
            /* Padding untuk tombol */
            font-size: 16px;
            /* Ukuran font */
            color: white;
            /* Warna teks */
            background-color: #00b9ad;
            /* Warna latar belakang tombol */
            border-radius: 5px;
            /* Sudut membulat */
            cursor: pointer;
            /* Kursor pointer saat hover */
            transition: background-color 0.2s ease;
            /* Efek transisi saat hover */

        }

        .form-check-input:checked+.form-check-label {
            background-color: #0056b3;
            /* Warna latar belakang saat checkbox tercentang */
        }

        .form-check-label:hover {
            background-color: #0056b3;
            /* Warna latar belakang saat hover */
        }
    </style>

</head>

<body>

    <div class="row">
        <div class="container">
            <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Form Dosen</h1>
                @yield('content')
            </div>
            <form method="POST" action="{{ route('form.storedosen') }}">
                @csrf
                @if ($dosen)
                <input type="hidden" name="dosen" value="{{ session('user_id') }}">

                <label for="nama">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="nama" name="nama"
                    placeholder="Nama" value="{{ $dosen->nama ?? '' }}"
                    @if (!$dosen->nama) placeholder="Nama " @endif required>

                <label for="nama">Nomor Identitas Pegawai Negeri Sipil <span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="nip" name="nip"
                    placeholder="Nomor Identitas Pegawai Negeri Sipil" value="{{ $dosen->nip ?? '' }}"
                    @if (!$dosen->nip) placeholder="Nomor Identitas Pegawai Negeri Sipil " @endif
                required>

                <label for="usia">Usia <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="usia" name="usia"
                    placeholder="Usia" value="{{ $dosen->usia ?? '' }}"
                    @if (!$dosen->usia) placeholder="Usia" @endif required>


                <label for="jeniskelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="jeniskelamin" name="jeniskelamin" required>
                    <option value="" disabled {{ !$dosen->jeniskelamin ? 'selected' : '' }}>Pilih Jenis
                        Kelamin</option>
                    <option value="Laki-laki"
                        {{ isset($dosen->jeniskelamin) && $dosen->jeniskelamin == 'Laki-laki' ? 'selected' : '' }}>
                        Laki-laki</option>
                    <option value="Perempuan"
                        {{ isset($dosen->jeniskelamin) && $dosen->jeniskelamin == 'Perempuan' ? 'selected' : '' }}>
                        Perempuan</option>
                </select>

                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="alamat" name="alamat"
                    placeholder="Alamat" value="{{ $dosen->alamat ?? '' }}"
                    @if (!$dosen->alamat) placeholder="Alamat " @endif required>

                <label for="nomor_telepon">Nomor Telepon <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="nomor_telepon" name="nomor_telepon"
                    placeholder="Nomor Telepon" value="{{ $dosen->nomor_telepon ?? '' }}"
                    @if (!$dosen->nomor_telepon) placeholder="Nomor Telepon " @endif required>

                <label for="saranmasukkan">Saran dan Masukan</label>
                <textarea class="form-control form-control-user" id="saranmasukkan" name="saranmasukkan"
                    placeholder="Saran dan Masukan">{{ $dosen->saranmasukkan ?? '' }}</textarea>

                <!--PRODI 1-->
                <label for="prodi">Program Studi <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="prodi" name="prodi" required>
                    <option value="" disabled {{ !$dosen->prodi ? 'selected' : '' }}>Pilih Program Studi</option>
                    @foreach ($programStudi as $jurusan => $prodis)
                    <optgroup label="{{ $jurusan }}">
                        @foreach ($prodis as $prodi)
                        <option value="{{ $prodi }}" {{ isset($dosen->prodi) && $dosen->prodi == $prodi ? 'selected' : '' }}>
                            {{ $prodi }}
                        </option>
                        @endforeach
                    </optgroup>
                    @endforeach
                </select>

                <!-- Checkbox untuk menambah program studi -->
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="tambahProdiCheckbox" onclick="toggleProdiFields()">
                    <label class="form-check-label" for="tambahProdiCheckbox">Tambah Prodi</label>
                </div>




                <!-- Container untuk program studi tambahan -->
                <div id="additionalProdiFields" style="display: none;">
                    <!--PRODI 2-->
                    <label for="prodi2">Program Studi ke-2</label>
                    <select class="form-control form-control-user" id="prodi2" name="prodi2">
                        <option value="" disabled {{ !$dosen->prodi2 ? 'selected' : '' }}>Pilih Program Studi</option>
                        <option value="">Kosongkan bagian ini</option> <!-- Opsi tidak memilih -->
                        @foreach ($programStudi as $jurusan => $prodis)
                        <optgroup label="{{ $jurusan }}">
                            @foreach ($prodis as $prodi)
                            <option value="{{ $prodi }}" {{ isset($dosen->prodi2) && $dosen->prodi2 == $prodi ? 'selected' : '' }}>
                                {{ $prodi }}
                            </option>
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>

                    <!--PRODI 3-->
                    <label for="prodi3">Program Studi ke-3</label>
                    <select class="form-control form-control-user" id="prodi3" name="prodi3">
                        <option value="" disabled {{ !$dosen->prodi3 ? 'selected' : '' }}>Pilih Program Studi</option>
                        <option value="">Kosongkan bagian ini</option> <!-- Opsi tidak memilih -->
                        @foreach ($programStudi as $jurusan => $prodis)
                        <optgroup label="{{ $jurusan }}">
                            @foreach ($prodis as $prodi)
                            <option value="{{ $prodi }}" {{ isset($dosen->prodi3) && $dosen->prodi3 == $prodi ? 'selected' : '' }}>
                                {{ $prodi }}
                            </option>
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>

                    <!--PRODI 4-->
                    <label for="prodi4">Program Studi ke-4</label>
                    <select class="form-control form-control-user" id="prodi4" name="prodi4">
                        <option value="" disabled {{ !$dosen->prodi4 ? 'selected' : '' }}>Pilih Program Studi</option>
                        <option value="">Kosongkan bagian ini</option> <!-- Opsi tidak memilih -->
                        @foreach ($programStudi as $jurusan => $prodis)
                        <optgroup label="{{ $jurusan }}">
                            @foreach ($prodis as $prodi)
                            <option value="{{ $prodi }}" {{ isset($dosen->prodi4) && $dosen->prodi4 == $prodi ? 'selected' : '' }}>
                                {{ $prodi }}
                            </option>
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>

                    <!--PRODI 5-->
                    <label for="prodi5">Program Studi ke-5</label>
                    <select class="form-control form-control-user" id="prodi5" name="prodi5">
                        <option value="" disabled {{ !$dosen->prodi5 ? 'selected' : '' }}>Pilih Program Studi</option>
                        <option value="">Kosongkan bagian ini</option> <!-- Opsi tidak memilih -->
                        @foreach ($programStudi as $jurusan => $prodis)
                        <optgroup label="{{ $jurusan }}">
                            @foreach ($prodis as $prodi)
                            <option value="{{ $prodi }}" {{ isset($dosen->prodi5) && $dosen->prodi5 == $prodi ? 'selected' : '' }}>
                                {{ $prodi }}
                            </option>
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                </div>

                <script>
                    function toggleProdiFields() {
                        const additionalFields = document.getElementById('additionalProdiFields');
                        const checkbox = document.getElementById('tambahProdiCheckbox');

                        // Tampilkan atau sembunyikan field prodi tambahan
                        additionalFields.style.display = checkbox.checked ? 'block' : 'none';
                    }
                </script>


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

                <table></table>
                <img src="{{ asset('assets/img/skl.png') }}" class="img-hr" alt="Pembatas HR2"
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
                        @foreach ($pertanyaanDosen as $pertanyaan)
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
                                    {{ $value == 4 ? 'required' : '' }}>
                                <!-- Tambahkan required hanya di radio pertama -->
                                <label
                                    for="pertanyaan_{{ $pertanyaan->pertanyaan_id }}_{{ $value }}">{{ $value }}</label>
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>

</body>




</script>
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>



@include('admin.layouts.footer')
@endsection

</html>