<!DOCTYPE html>
<html lang="en">
@extends('admin.layouts.base')

@section('title', 'Form Survei Alumni')
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
            <div class="watermark"> </div>
            <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Form Survei Alumni</h1>
                @yield('content')
            </div>
            <form method="POST" action="{{ route('form.storealumni') }}">
                @csrf
                <input type="hidden" name="alumni_id" value="{{ session('user_id') }}">

                <label for="nama">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="nama" name="nama"
                    placeholder="Nama" required>

                <label for="usia">Usia <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="usia" name="usia"
                    placeholder="Usia" required>


                <label for="jeniskelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="jeniskelamin" name="jeniskelamin" required>
                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">
                        Laki-laki</option>
                    <option value="Perempuan">
                        Perempuan</option>
                </select>

                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="alamat" name="alamat"
                    placeholder="Alamat" required>

                <label for="nomor_telepon">Nomor Telepon <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="nomor_telepon" name="nomor_telepon"
                    placeholder="Nomor Telepon" required>

                <label for="saranmasukkan">Saran dan Masukan</label>
                <textarea class="form-control form-control-user" id="saranmasukkan" name="saranmasukkan"
                    placeholder="Saran dan Masukan"></textarea>


                <label for="nama">Program Studi <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="prodi" name="prodi" required>
                    <option value="" disabled selected>Pilih Program Studi
                    </option>
                    @foreach ($programStudi as $jurusan => $prodis)
                    <optgroup label="{{ $jurusan }}">
                        @foreach ($prodis as $prodi)
                        <option value="{{ $prodi }}">
                            {{ $prodi }}
                        </option>
                        @endforeach
                    </optgroup>
                    @endforeach
                </select>


                <label for="nama">Tahun Lulus <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="tahun_lulus" name="tahun_lulus"
                    placeholder="Tahun Lulus" required>

                <label for="nama">Status Pekerjaan <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="pekerjaan" name="pekerjaan" required>
                    <option value="" disabled selected>Pilih status pekerjaan</option>
                    <option value="Bekerja">Bekerja
                    </option>
                    <option value="Lanjut Studi">
                        Lanjut Studi</option>
                    <option value="Belum Bekerja">
                        Belum Bekerja</option>
                </select>

                <label for="nama">Kesesuaian Pekerjaan dengan Prodi <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="kesesuaian" name="kesesuaian" required>
                    <option value="" disabled selected>Kesesuaian pekerjaan dengan Prodi</option>
                    <option value="Sesuai">Sesuai</option>
                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                </select>

                <label for="nama">Waktu Memperoleh Pekerjaan Pertama <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="waktu" name="waktu" required>
                    <option value="" disabled selected>Waktu memperoleh pekerjaan pertama</option>
                    <option value="Sebelum lulus">
                        Sebelum lulus</option>
                    <option value="Setelah lulus < 3 bulan">Setelah lulus < 3
                            bulan</option>
                    <option value="3 - 6 bulan">3 - 6
                        bulan</option>
                    <option value="7 - 11 bulan">7 - 11
                        bulan</option>
                    <option value="12 - 17 bulan">12 -
                        17 bulan</option>
                    <option value="≥ 18 bulan">≥ 18 bulan
                    </option>
                </select>

                <label for="nama">Instansi Tempat Bekerja <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="instansi" name="instansi" required>
                    <option value="" disabled selected>Instansi tempat bekerja</option>
                    <option value="Puskesmas">Puskesmas
                    </option>
                    <option value="Klinik">Klinik</option>
                    <option value="Rumah Sakit">Rumah
                        Sakit</option>
                    <option value="Apotik">Apotik</option>
                    <option value="Lab">Lab</option>
                    <option value="Lainnya">Lainnya
                    </option>
                </select>

                <label for="Nama Instansi">Nama Instansi <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="tempat_kerja"
                    name="tempat_kerja" placeholder="Nama Instansi" required>


                <label for="nama">Penghasilan/Bulan <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="penghasilan" name="penghasilan" required>
                    <option value="" disabled selected>Penghasilan/Bulan</option>
                    <option value="< 2 juta">
                        < 2 juta</option>
                    <option value="2 - 3,5 juta">2
                        - 3,5 juta</option>
                    <option value="3,5 - 5 juta">
                        3,5 - 5 juta</option>
                    <option value="5 - 6,5 juta">5
                        - 6,5 juta</option>
                    <option value="> 6,5 juta">> 6,5
                        juta</option>
                </select>

                <label for="nama">Cara Mendapatkan Pekerjaan <span class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="cara" name="cara" required>
                    <option value="" disabled selected>Cara mendapatkan pekerjaan</option>
                    <option value="Melamar ke instansi">Melamar ke instansi
                    </option>
                    <option value="Lewat internet/iklan online/mail list">Lewat
                        internet/iklan online/mail list</option>
                    <option value="Dihubungi oleh instansi/perusahaan">Dihubungi
                        oleh instansi/perusahaan</option>
                    <option value="Melalui jejaring alumni">Melalui jejaring alumni
                    </option>
                    <option value="Dihubungi perusahaan">Dihubungi perusahaan
                    </option>
                    <option value="Informasi dari pusat karir Poltekkes">Informasi
                        dari pusat karir Poltekkes</option>
                    <option value="Relasi dosen, orang tua, saudara,teman/lainnya">
                        Relasi dosen, orang tua, saudara,teman/lainnya</option>
                    <option value="Penempatan kerja/magang">Penempatan kerja/magang
                    </option>
                    <option value="Membangun usaha sendiri/lainnya">Membangun usaha
                        sendiri/lainnya</option>
                </select>

                <label for="nama">Jika Melanjutkan Studi dengan Biaya <span
                        class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="studi_lanjut" name="studi_lanjut" required>
                    <option value="" disabled selected>Jika Studi lanjut</option>
                    <option value="Biaya sendiri">Biaya sendiri</option>
                    <option value="Beasiswa">Beasiswa
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