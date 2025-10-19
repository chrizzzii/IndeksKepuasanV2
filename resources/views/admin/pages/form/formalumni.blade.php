<!DOCTYPE html>
<html lang="en">
@extends('admin.layouts.base')

@section('title', 'Form Survei Alumni')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/from.css') }}" rel="stylesheet">
    <script src="{{ asset('js/validasi/validasi-alumni.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

</head>

<body>
    @php
    $dataAlumni = session('dataAlumni');
    @endphp
    <div class="row">

        <div class="container">
            <div class="watermark"> </div>
            <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Form Alumni</h1>
                @yield('content')
            </div>
            <form method="POST" action="{{ route('form.storealumni') }}" novalidate>
                @csrf
                <input type="hidden" name="alumni_id" value="{{ session('user_id') }}">

                <input type="hidden" name="email" value="{{ old('email', optional($dataAlumni)->email) }}">


                <label for="nama">Nama <span class="text-danger">*</span> <span><small id="nama-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="text" class="form-control form-control-user" id="nama" name="nama"
                    placeholder="Nama" value="{{ old('nama', optional($dataAlumni)->nama) }}"
                    required>

                <label for="usia">Usia <span class="text-danger">*</span> <span><small id="usia-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="number" class="form-control form-control-user" id="usia" name="usia"
                    placeholder="Usia" min="16" max="100" value="{{ old('usia', optional($dataAlumni)->usia) }}"
                    required>


                <label for="jeniskelamin">Jenis Kelamin <span class="text-danger">*</span>
                    <span><small id="jeniskelamin-error" class="invalid-feedback" style="display:none;"></small></span>
                </label>

                <select class="form-control form-control-user" id="jeniskelamin" name="jeniskelamin" required>
                    <option value="" disabled {{ old('jeniskelamin', optional($dataAlumni)->jeniskelamin) ? '' : 'selected' }}>
                        Pilih Jenis Kelamin
                    </option>
                    <option value="Laki-laki" {{ old('jeniskelamin', optional($dataAlumni)->jeniskelamin) == 'Laki-laki' ? 'selected' : '' }}>
                        Laki-laki
                    </option>
                    <option value="Perempuan" {{ old('jeniskelamin', optional($dataAlumni)->jeniskelamin) == 'Perempuan' ? 'selected' : '' }}>
                        Perempuan
                    </option>
                </select>

                <label for="alamat">Alamat <span class="text-danger">*</span> <span><small id="alamat-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="text" class="form-control form-control-user" id="alamat" name="alamat"
                    placeholder="Alamat" value="{{ old('alamat', optional($dataAlumni)->alamat) }}" required>

                <label for="nomor_telepon">Nomor Telepon <span class="text-danger">*</span> <span><small id="nomor_telepon-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="number" class="form-control form-control-user" id="nomor_telepon" name="nomor_telepon"
                    placeholder="Nomor Telepon" value="{{ old('nomor_telepon', optional($dataAlumni)->nomor_telepon) }}" required>

                <label for="saranmasukkan">Saran dan Masukan</label> <span><small id="saranmasukkan-count" class="text-muted">0 / 255 karakter</small></span> <span><small id="saranmasukkan-error" class="invalid-feedback" style="display:none;"></small>
                </span>
                <textarea class="form-control form-control-user" id="saranmasukkan" name="saranmasukkan"
                    placeholder="Saran dan Masukan" value="{{ old('saranmasukkan', optional($dataAlumni)->saranmasukkan) }}"></textarea>


                <label for="prodi">Program Studi <span class="text-danger">*</span>
                    <span><small id="prodi-error" class="invalid-feedback" style="display:none;"></small></span>
                </label>

                <select class="form-control form-control-user" id="prodi" name="prodi" required>
                    <option value="" disabled {{ old('prodi', optional($dataAlumni)->prodi) ? '' : 'selected' }}>
                        Pilih Program Studi
                    </option>
                    @foreach ($programStudi as $jurusan => $prodis)
                    <optgroup label="{{ $jurusan }}">
                        @foreach ($prodis as $prodi)
                        <option value="{{ $prodi }}"
                            {{ old('prodi', optional($dataAlumni)->prodi) == $prodi ? 'selected' : '' }}>
                            {{ $prodi }}
                        </option>
                        @endforeach
                    </optgroup>
                    @endforeach
                </select>


                <label for="tahun_lulus">Tahun Lulus <span class="text-danger">*</span> <span><small id="tahun_lulus-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="text" class="form-control form-control-user" id="tahun_lulus" name="tahun_lulus"
                    placeholder="Tahun Lulus" value="{{ old('tahun_lulus', optional($dataAlumni)->tahun_lulus) }}" required>

                <label for="pekerjaan">Status Pekerjaan <span class="text-danger">*</span> <span><small id="pekerjaan-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <select class="form-control form-control-user" id="pekerjaan" name="pekerjaan" required>
                    <option value="" disabled {{ old('pekerjaan', optional($dataAlumni)->pekerjaan) ? '' : 'selected' }}>Pilih status pekerjaan</option>
                    <option value="Bekerja" {{ old('pekerjaan', optional($dataAlumni)->pekerjaan) == 'Bekerja' ? 'selected' : '' }}>Bekerja</option>
                    <option value="Lanjut Studi" {{ old('pekerjaan', optional($dataAlumni)->pekerjaan) == 'Lanjut Studi' ? 'selected' : '' }}>Lanjut Studi</option>
                    <option value="Belum Bekerja" {{ old('pekerjaan', optional($dataAlumni)->pekerjaan) == 'Belum Bekerja' ? 'selected' : '' }}>Belum Bekerja</option>
                </select>

                <label for="kesesuaian">Kesesuaian Pekerjaan dengan Prodi <span class="text-danger">*</span> <span><small id="kesesuaian-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <select class="form-control form-control-user" id="kesesuaian" name="kesesuaian" required>
                    <option value="" disabled {{ old('kesesuaian', optional($dataAlumni)->kesesuaian) ? '' : 'selected' }}>
                        Kesesuaian pekerjaan dengan Prodi
                    </option>
                    <option value="Sesuai" {{ old('kesesuaian', optional($dataAlumni)->kesesuaian) == 'Sesuai' ? 'selected' : '' }}>
                        Sesuai
                    </option>
                    <option value="Tidak Sesuai" {{ old('kesesuaian', optional($dataAlumni)->kesesuaian) == 'Tidak Sesuai' ? 'selected' : '' }}>
                        Tidak Sesuai
                    </option>
                </select>

                <label for="waktu">Waktu Memperoleh Pekerjaan Pertama <span class="text-danger">*</span> <span><small id="waktu-error" class="invalid-feedback" style="display:none;"></small> </span></label>
                <select class="form-control form-control-user" id="waktu" name="waktu" required>
                    <option value="" disabled {{ old('waktu', optional($dataAlumni)->waktu) ? '' : 'selected' }}>
                        Waktu memperoleh pekerjaan pertama
                    </option>
                    <option value="Sebelum lulus" {{ old('waktu', optional($dataAlumni)->waktu) == 'Sebelum lulus' ? 'selected' : '' }}>
                        Sebelum lulus
                    </option>
                    <option value="Setelah lulus < 3 bulan" {{ old('waktu', optional($dataAlumni)->waktu) == 'Setelah lulus < 3 bulan' ? 'selected' : '' }}>
                        Setelah lulus < 3 bulan
                            </option>
                    <option value="3 - 6 bulan" {{ old('waktu', optional($dataAlumni)->waktu) == '3 - 6 bulan' ? 'selected' : '' }}>
                        3 - 6 bulan
                    </option>
                    <option value="7 - 11 bulan" {{ old('waktu', optional($dataAlumni)->waktu) == '7 - 11 bulan' ? 'selected' : '' }}>
                        7 - 11 bulan
                    </option>
                    <option value="12 - 17 bulan" {{ old('waktu', optional($dataAlumni)->waktu) == '12 - 17 bulan' ? 'selected' : '' }}>
                        12 - 17 bulan
                    </option>
                    <option value="≥ 18 bulan" {{ old('waktu', optional($dataAlumni)->waktu) == '≥ 18 bulan' ? 'selected' : '' }}>
                        ≥ 18 bulan
                    </option>
                </select>

                <label for="jenistempatkerja">Jenis tempat Kerja<span class="text-danger">*</span> <span><small id="jenistempatkerja-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <select class="form-control form-control-user" id="jenistempatkerja" name="jenistempatkerja" required>
                    <option value="" disabled {{ old('jenistempatkerja', optional($dataAlumni)->jenistempatkerja) ? '' : 'selected' }}>
                        Pilih Jenis Tempat Kerja
                    </option>
                    <option value="Fasyankes" {{ old('jenistempatkerja', optional($dataAlumni)->jenistempatkerja) == 'Fasyankes' ? 'selected' : '' }}>
                        Fasyankes
                    </option>
                    <option value="Non Fasyankes" {{ old('jenistempatkerja', optional($dataAlumni)->jenistempatkerja) == 'Non Fasyankes' ? 'selected' : '' }}>
                        Non Fasyankes
                    </option>
                </select>

                <label for="instansi">Instansi Tempat Bekerja <span class="text-danger">*</span> <span><small id="instansi-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <select class="form-control form-control-user" id="instansi" name="instansi" required>
                    <option value="" disabled {{ old('instansi', optional($dataAlumni)->instansi) ? '' : 'selected' }}>
                        Instansi tempat bekerja
                    </option>
                    <option value="Puskesmas" {{ old('instansi', optional($dataAlumni)->instansi) == 'Puskesmas' ? 'selected' : '' }}>Puskesmas</option>
                    <option value="RS Pemerintah" {{ old('instansi', optional($dataAlumni)->instansi) == 'RS Pemerintah' ? 'selected' : '' }}>RS Pemerintah</option>
                    <option value="RS Swasta" {{ old('instansi', optional($dataAlumni)->instansi) == 'RS Swasta' ? 'selected' : '' }}>RS Swasta</option>
                    <option value="Klinik" {{ old('instansi', optional($dataAlumni)->instansi) == 'Klinik' ? 'selected' : '' }}>Klinik</option>
                    <option value="Laboratorium" {{ old('instansi', optional($dataAlumni)->instansi) == 'Laboratorium' ? 'selected' : '' }}>Laboratorium</option>
                    <option value="Praktek Mandiri" {{ old('instansi', optional($dataAlumni)->instansi) == 'Praktek Mandiri' ? 'selected' : '' }}>Praktek Mandiri</option>
                    <option value="Lainnya" {{ old('instansi', optional($dataAlumni)->instansi) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>

                <label for="tempat_kerja">Nama Instansi <span class="text-danger">*</span> <span><small id="tempat_kerja-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="text" class="form-control form-control-user" id="tempat_kerja"
                    name="tempat_kerja" placeholder="Nama Instansi" value="{{ old('tempat_kerja', optional($dataAlumni)->tempat_kerja) }}" required>


                <label for="penghasilan">Penghasilan/Bulan <span class="text-danger">*</span> <span><small id="penghasilan-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <select class="form-control form-control-user" id="penghasilan" name="penghasilan" required>
                    <option value="" disabled {{ old('penghasilan', optional($dataAlumni)->penghasilan) ? '' : 'selected' }}>
                        Penghasilan/Bulan
                    </option>
                    <option value="< 2 juta" {{ old('penghasilan', optional($dataAlumni)->penghasilan) == '< 2 juta' ? 'selected' : '' }}>
                        < 2 juta</option>
                    <option value="2 - 3,5 juta" {{ old('penghasilan', optional($dataAlumni)->penghasilan) == '2 - 3,5 juta' ? 'selected' : '' }}>2 - 3,5 juta</option>
                    <option value="3,5 - 5 juta" {{ old('penghasilan', optional($dataAlumni)->penghasilan) == '3,5 - 5 juta' ? 'selected' : '' }}>3,5 - 5 juta</option>
                    <option value="5 - 6,5 juta" {{ old('penghasilan', optional($dataAlumni)->penghasilan) == '5 - 6,5 juta' ? 'selected' : '' }}>5 - 6,5 juta</option>
                    <option value="> 6,5 juta" {{ old('penghasilan', optional($dataAlumni)->penghasilan) == '> 6,5 juta' ? 'selected' : '' }}>> 6,5 juta</option>
                </select>

                <label for="cara">Cara Mendapatkan Pekerjaan <span class="text-danger">*</span> <span><small id="cara-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <select class="form-control form-control-user" id="cara" name="cara" required>
                    <option value="" disabled {{ old('cara', optional($dataAlumni)->cara) ? '' : 'selected' }}>
                        Cara mendapatkan pekerjaan
                    </option>
                    <option value="Melamar ke instansi" {{ old('cara', optional($dataAlumni)->cara) == 'Melamar ke instansi' ? 'selected' : '' }}>
                        Melamar ke instansi
                    </option>
                    <option value="Lewat internet/iklan online/mail list" {{ old('cara', optional($dataAlumni)->cara) == 'Lewat internet/iklan online/mail list' ? 'selected' : '' }}>
                        Lewat internet/iklan online/mail list
                    </option>
                    <option value="Dihubungi oleh instansi/perusahaan" {{ old('cara', optional($dataAlumni)->cara) == 'Dihubungi oleh instansi/perusahaan' ? 'selected' : '' }}>
                        Dihubungi oleh instansi/perusahaan
                    </option>
                    <option value="Melalui jejaring alumni" {{ old('cara', optional($dataAlumni)->cara) == 'Melalui jejaring alumni' ? 'selected' : '' }}>
                        Melalui jejaring alumni
                    </option>
                    <option value="Dihubungi perusahaan" {{ old('cara', optional($dataAlumni)->cara) == 'Dihubungi perusahaan' ? 'selected' : '' }}>
                        Dihubungi perusahaan
                    </option>
                    <option value="Informasi dari pusat karir Poltekkes" {{ old('cara', optional($dataAlumni)->cara) == 'Informasi dari pusat karir Poltekkes' ? 'selected' : '' }}>
                        Informasi dari pusat karir Poltekkes
                    </option>
                    <option value="Relasi dosen, orang tua, saudara,teman/lainnya" {{ old('cara', optional($dataAlumni)->cara) == 'Relasi dosen, orang tua, saudara,teman/lainnya' ? 'selected' : '' }}>
                        Relasi dosen, orang tua, saudara,teman/lainnya
                    </option>
                    <option value="Penempatan kerja/magang" {{ old('cara', optional($dataAlumni)->cara) == 'Penempatan kerja/magang' ? 'selected' : '' }}>
                        Penempatan kerja/magang
                    </option>
                    <option value="Membangun usaha sendiri/lainnya" {{ old('cara', optional($dataAlumni)->cara) == 'Membangun usaha sendiri/lainnya' ? 'selected' : '' }}>
                        Membangun usaha sendiri/lainnya
                    </option>
                </select>

                <label for="studi_lanjut">Jika Melanjutkan Studi dengan Biaya <span
                        class="text-danger">*</span> <span><small id="studi_lanjut-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <select class="form-control form-control-user" id="studi_lanjut" name="studi_lanjut" required>
                    <option value="" disabled {{ old('studi_lanjut', optional($dataAlumni)->studi_lanjut) ? '' : 'selected' }}>Jika Studi lanjut</option>
                    <option value="Biaya sendiri" {{ old('studi_lanjut', optional($dataAlumni)->studi_lanjut) == 'Biaya sendiri' ? 'selected' : '' }}>Biaya sendiri</option>
                    <option value="Beasiswa" {{ old('studi_lanjut', optional($dataAlumni)->studi_lanjut) == 'Beasiswa' ? 'selected' : '' }}>Beasiswa</option>
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
                                    @if($value==1) required @endif>
                                <label for="pertanyaanu_{{ $pertanyaan->pertanyaan_id }}_{{ $value }}">{{ $value }}</label>
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
                                @foreach ([1,2,3,4] as $value)
                                <input type="radio"
                                    id="pertanyaan_{{ $pertanyaan->pertanyaan_id }}_{{ $value }}"
                                    name="pertanyaan[{{ $pertanyaan->pertanyaan_id }}]"
                                    value="{{ $value }}"
                                    {{ isset($responses[$pertanyaan->pertanyaan_id]) && $responses[$pertanyaan->pertanyaan_id] == $value ? 'checked' : '' }}
                                    @if(!isset($responses[$pertanyaan->pertanyaan_id]) && $value == 1) required @endif>
                                <label for="pertanyaan_{{ $pertanyaan->pertanyaan_id }}_{{ $value }}">{{ $value }}</label>
                                @endforeach
                            </td>
                        </tr>
                        @endif
                        @endforeach
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