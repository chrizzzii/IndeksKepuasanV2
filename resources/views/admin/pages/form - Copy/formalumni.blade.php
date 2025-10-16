<!DOCTYPE html>
<html lang="en">
@extends('admin.layouts.base')

@section('title', 'Form Survei Alumni')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/from.css') }}" rel="stylesheet">

</head>

<body>

    <div class="row">

        <div class="container">
            <div class="watermark"> </div>
            <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Form Survei Alumni</h1>
                @yield('content')
            </div>
            <form method="POST" action="{{ route('form.storealumni') }}">
                @csrf
                @if ($alumni)
                <input type="hidden" name="alumni_id" value="{{ session('user_id') }}">

                <label for="nama">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="nama" name="nama"
                    placeholder="Nama" value="{{ $alumni->nama ?? '' }}"
                    @if (!$alumni->nama) placeholder="Nama " @endif required>

                <label for="usia">Usia <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="usia" name="usia"
                    placeholder="Usia" value="{{ $alumni->usia ?? '' }}"
                    @if (!$alumni->usia) placeholder="Usia" @endif required>


                <label for="jeniskelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="jeniskelamin" name="jeniskelamin" required>
                    <option value="" disabled {{ !$alumni->jeniskelamin ? 'selected' : '' }}>Pilih Jenis
                        Kelamin</option>
                    <option value="Laki-laki"
                        {{ isset($alumni->jeniskelamin) && $alumni->jeniskelamin == 'Laki-laki' ? 'selected' : '' }}>
                        Laki-laki</option>
                    <option value="Perempuan"
                        {{ isset($alumni->jeniskelamin) && $alumni->jeniskelamin == 'Perempuan' ? 'selected' : '' }}>
                        Perempuan</option>
                </select>

                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="alamat" name="alamat"
                    placeholder="Alamat" value="{{ $alumni->alamat ?? '' }}"
                    @if (!$alumni->alamat) placeholder="Alamat " @endif required>

                <label for="nomor_telepon">Nomor Telepon <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="nomor_telepon" name="nomor_telepon"
                    placeholder="Nomor Telepon" value="{{ $alumni->nomor_telepon ?? '' }}"
                    @if (!$alumni->nomor_telepon) placeholder="Nomor Telepon " @endif required>

                <label for="saranmasukkan">Saran dan Masukan</label>
                <textarea class="form-control form-control-user" id="saranmasukkan" name="saranmasukkan"
                    placeholder="Saran dan Masukan">{{ $alumni->saranmasukkan ?? '' }}</textarea>


                <label for="nama">Program Studi <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="prodi" name="prodi" required>
                    <option value="" disabled {{ !$alumni->prodi ? 'selected' : '' }}>Pilih Program Studi
                    </option>
                    @foreach ($programStudi as $jurusan => $prodis)
                    <optgroup label="{{ $jurusan }}">
                        @foreach ($prodis as $prodi)
                        <option value="{{ $prodi }}"
                            {{ isset($alumni->prodi) && $alumni->prodi == $prodi ? 'selected' : '' }}>
                            {{ $prodi }}
                        </option>
                        @endforeach
                    </optgroup>
                    @endforeach
                </select>


                <label for="nama">Tahun Lulus <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="tahun_lulus" name="tahun_lulus"
                    placeholder="Tahun Lulus" value="{{ $alumni->tahun_lulus ?? '' }}"
                    @if (!$alumni->prodi) placeholder="Tahun Lulus" @endif required>

                <label for="nama">Status Pekerjaan <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="pekerjaan" name="pekerjaan" required>
                    <option value="" disabled selected>Pilih status pekerjaan</option>
                    <option value="Bekerja" {{ $alumni->pekerjaan == 'Bekerja' ? 'selected' : '' }}>Bekerja
                    </option>
                    <option value="Lanjut Studi" {{ $alumni->pekerjaan == 'Lanjut Studi' ? 'selected' : '' }}>
                        Lanjut Studi</option>
                    <option value="Belum Bekerja" {{ $alumni->pekerjaan == 'Belum Bekerja' ? 'selected' : '' }}>
                        Belum Bekerja</option>
                </select>

                <label for="nama">Kesesuaian Pekerjaan dengan Prodi <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="kesesuaian" name="kesesuaian" required>
                    <option value="" disabled selected>Kesesuaian pekerjaan dengan Prodi</option>
                    <option value="Sesuai" {{ $alumni->kesesuaian == 'Sesuai' ? 'selected' : '' }}>Sesuai</option>
                    <option value="Tidak Sesuai" {{ $alumni->kesesuaian == 'Tidak Sesuai' ? 'selected' : '' }}>Tidak Sesuai</option>
                </select>

                <label for="nama">Waktu Memperoleh Pekerjaan Pertama <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="waktu" name="waktu" required>
                    <option value="" disabled selected>Waktu memperoleh pekerjaan pertama</option>
                    <option value="Sebelum lulus" {{ $alumni->waktu == 'Sebelum lulus' ? 'selected' : '' }}>
                        Sebelum lulus</option>
                    <option value="Setelah lulus < 3 bulan"
                        {{ $alumni->waktu == 'Setelah lulus < 3 bulan' ? 'selected' : '' }}>Setelah lulus < 3
                            bulan</option>
                    <option value="3 - 6 bulan" {{ $alumni->waktu == '3 - 6 bulan' ? 'selected' : '' }}>3 - 6
                        bulan</option>
                    <option value="7 - 11 bulan" {{ $alumni->waktu == '7 - 11 bulan' ? 'selected' : '' }}>7 - 11
                        bulan</option>
                    <option value="12 - 17 bulan" {{ $alumni->waktu == '12 - 17 bulan' ? 'selected' : '' }}>12 -
                        17 bulan</option>
                    <option value="≥ 18 bulan" {{ $alumni->waktu == '≥ 18 bulan' ? 'selected' : '' }}>≥ 18 bulan
                    </option>
                </select>

                <label for="nama">Instansi Tempat Bekerja <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="instansi" name="instansi" required>
                    <option value="" disabled selected>Instansi tempat bekerja</option>
                    <option value="Puskesmas" {{ $alumni->instansi == 'Puskesmas' ? 'selected' : '' }}>Puskesmas
                    </option>
                    <option value="Klinik" {{ $alumni->instansi == 'Klinik' ? 'selected' : '' }}>Klinik</option>
                    <option value="Rumah Sakit" {{ $alumni->instansi == 'Rumah Sakit' ? 'selected' : '' }}>Rumah
                        Sakit</option>
                    <option value="Apotik" {{ $alumni->instansi == 'Apotik' ? 'selected' : '' }}>Apotik</option>
                    <option value="Lab" {{ $alumni->instansi == 'Lab' ? 'selected' : '' }}>Lab</option>
                    <option value="Lainnya" {{ $alumni->instansi == 'Lainnya' ? 'selected' : '' }}>Lainnya
                    </option>
                </select>

                <label for="Nama Instansi">Nama Instansi <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="tempat_kerja"
                    name="tempat_kerja" placeholder="Nama Instansi" value="{{ $alumni->tempat_kerja ?? '' }}"
                    @if (!$alumni->tempat_kerja) placeholder="Nama Instansi" @endif required>


                <label for="nama">Penghasilan/Bulan <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="penghasilan" name="penghasilan" required>
                    <option value="" disabled selected>Penghasilan/Bulan</option>
                    <option value="< 2 juta" {{ $alumni->penghasilan == '< 2 juta' ? 'selected' : '' }}>
                        < 2 juta</option>
                    <option value="2 - 3,5 juta" {{ $alumni->penghasilan == '2 - 3,5 juta' ? 'selected' : '' }}>2
                        - 3,5 juta</option>
                    <option value="3,5 - 5 juta" {{ $alumni->penghasilan == '3,5 - 5 juta' ? 'selected' : '' }}>
                        3,5 - 5 juta</option>
                    <option value="5 - 6,5 juta" {{ $alumni->penghasilan == '5 - 6,5 juta' ? 'selected' : '' }}>5
                        - 6,5 juta</option>
                    <option value="> 6,5 juta" {{ $alumni->penghasilan == '> 6,5 juta' ? 'selected' : '' }}>> 6,5
                        juta</option>
                </select>

                <label for="nama">Cara Mendapatkan Pekerjaan <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="cara" name="cara" required>
                    <option value="" disabled selected>Cara mendapatkan pekerjaan</option>
                    <option value="Melamar ke instansi"
                        {{ $alumni->cara == 'Melamar ke instansi' ? 'selected' : '' }}>Melamar ke instansi
                    </option>
                    <option value="Lewat internet/iklan online/mail list"
                        {{ $alumni->cara == 'Lewat internet/iklan online/mail list' ? 'selected' : '' }}>Lewat
                        internet/iklan online/mail list</option>
                    <option value="Dihubungi oleh instansi/perusahaan"
                        {{ $alumni->cara == 'Dihubungi oleh instansi/perusahaan' ? 'selected' : '' }}>Dihubungi
                        oleh instansi/perusahaan</option>
                    <option value="Melalui jejaring alumni"
                        {{ $alumni->cara == 'Melalui jejaring alumni' ? 'selected' : '' }}>Melalui jejaring alumni
                    </option>
                    <option value="Dihubungi perusahaan"
                        {{ $alumni->cara == 'Dihubungi perusahaan' ? 'selected' : '' }}>Dihubungi perusahaan
                    </option>
                    <option value="Informasi dari pusat karir Poltekkes"
                        {{ $alumni->cara == 'Informasi dari pusat karir Poltekkes' ? 'selected' : '' }}>Informasi
                        dari pusat karir Poltekkes</option>
                    <option value="Relasi dosen, orang tua, saudara,teman/lainnya"
                        {{ $alumni->cara == 'Relasi dosen, orang tua, saudara,teman/lainnya' ? 'selected' : '' }}>
                        Relasi dosen, orang tua, saudara,teman/lainnya</option>
                    <option value="Penempatan kerja/magang"
                        {{ $alumni->cara == 'Penempatan kerja/magang' ? 'selected' : '' }}>Penempatan kerja/magang
                    </option>
                    <option value="Membangun usaha sendiri/lainnya"
                        {{ $alumni->cara == 'Membangun usaha sendiri/lainnya' ? 'selected' : '' }}>Membangun usaha
                        sendiri/lainnya</option>
                </select>

                <label for="nama">Jika Melanjutkan Studi dengan Biaya <span
                        class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="studi_lanjut" name="studi_lanjut" required>
                    <option value="" disabled selected>Jika Studi lanjut</option>
                    <option value="Biaya sendiri"
                        {{ $alumni->studi_lanjut == 'Biaya sendiri' ? 'selected' : '' }}>Biaya sendiri</option>
                    <option value="Beasiswa" {{ $alumni->studi_lanjut == 'Beasiswa' ? 'selected' : '' }}>Beasiswa
                    </option>
                </select>

                <img src="{{ asset('assets/img/ikm.png') }}" class="img-hr" alt="Pembatas HR1"
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
                        @foreach ($pertanyaanMasyarakat as $pertanyaan)
                        <tr>
                            <td>{{ $no++ }}</td> <!-- Nomor urut -->
                            <td>{{ $pertanyaan->pertanyaan }}</td> <!-- Uraian pertanyaan -->

                            <td>
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
                        @php $no = 1; @endphp <!-- Variabel untuk menampilkan nomor urut pertanyaan -->

                        @foreach ($pertanyaanAlumni as $pertanyaan)
                        <!-- Tampilkan hanya jika ID >= 12 -->
                        @if ($pertanyaan->pertanyaan_id >= 12)
                        <tr>
                            <td>{{ $no++ }}</td> <!-- Nomor urut, otomatis bertambah -->
                            <td>{{ $pertanyaan->pertanyaan }}</td> <!-- Uraian dari kolom 'pertanyaan' -->
                            <td>
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
                        @endif
                        @endforeach
                        @endif
                    </tbody>
                </table>

                <hr>

                <button type="submit" class="btn btn-primary">Submit</button>
                <br>
            </form>


            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>

</body>

</script>
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

@include('admin.layouts.footer')
@endsection

</html>