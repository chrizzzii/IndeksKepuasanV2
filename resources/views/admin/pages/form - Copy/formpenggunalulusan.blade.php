<!DOCTYPE html>
<html lang="en">
@extends('admin.layouts.base')

@section('title', 'Form Survei Pengguna Lulusan')
@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('assets/css/from.css') }}" rel="stylesheet">

    </head>

    <body>

        <div class="row">


            <div class="container">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Form Pengguna Lulusan</h1>
                    @yield('content')
                </div>
                <form method="POST" action="{{ route('form.storepenggunalulusan') }}">
                    @csrf
                    @if ($penggunalulusan)
                        <input type="hidden" name="penggunalulusan" value="{{ session('user_id') }}">

                        <div style="background-color: #f0f0f0; padding: 10px; font-weight: bold;">
                            A. IDENTITAS PENILAI
                        </div>
                        <label for="nama">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="nama_identitaspenilai"
                            name="nama_identitaspenilai" placeholder="Nama"
                            value="{{ $penggunalulusan->nama_identitaspenilai ?? '' }}"
                            @if (!$penggunalulusan->nama_identitaspenilai) placeholder="Nama " @endif required>

                        <label for="nama">Usia <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="usia_identitaspenilai"
                            name="usia_identitaspenilai" placeholder="Usia"
                            value="{{ $penggunalulusan->usia_identitaspenilai ?? '' }}"
                            @if (!$penggunalulusan->usia_identitaspenilai) placeholder="Usia " @endif required>

                        <label for="nama">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select class="form-control form-control-user" id="jeniskelamin_identitaspenilai"
                            name="jeniskelamin_identitaspenilai" required>
                            <option value="" disabled selected>Jenis Kelamin</option>
                            <option value="Laki-laki"
                                {{ $penggunalulusan->jeniskelamin_identitaspenilai == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan"
                                {{ $penggunalulusan->jeniskelamin_identitaspenilai == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>

                        <label for="alamat">Alamat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="alamat_identitaspenilai"
                            name="alamat_identitaspenilai" placeholder="Alamat"
                            value="{{ $penggunalulusan->alamat_identitaspenilai ?? '' }}"
                            @if (!$penggunalulusan->alamat_identitaspenilai) placeholder="Alamat " @endif required>

                        <label for="nama">Kontak Person (HP/WA) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="kontak_identitaspenilai"
                            name="kontak_identitaspenilai" placeholder="Kontak Person (Email/HP/Wa)"
                            value="{{ $penggunalulusan->kontak_identitaspenilai ?? '' }}"
                            @if (!$penggunalulusan->kontak_identitaspenilai) placeholder="Kontak Person (Email/HP/Wa)" @endif required>

                        <label for="nama">Instansi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="instansi_identitaspenilai"
                            name="instansi_identitaspenilai" placeholder="Instansi"
                            value="{{ $penggunalulusan->instansi_identitaspenilai ?? '' }}"
                            @if (!$penggunalulusan->instansi_identitaspenilai) placeholder="Instansi" @endif required>

                        <label for="nama">Jabatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="jabatan_identitaspenilai"
                            name="jabatan_identitaspenilai" placeholder="Jabatan"
                            value="{{ $penggunalulusan->jabatan_identitaspenilai ?? '' }}"
                            @if (!$penggunalulusan->jabatan_identitaspenilai) placeholder="Jabatan" @endif required>

                        <label for="nama">Lama Bekerja Dengan Lulusan(Tahun) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="lamabekerjadenganlulusan"
                            name="lamabekerjadenganlulusan" placeholder="Lama Bekerja Dengan Lulusan(Tahun)"
                            value="{{ $penggunalulusan->lamabekerjadenganlulusan ?? '' }}"
                            @if (!$penggunalulusan->lamabekerjadenganlulusan) placeholder="Lama Bekerja Dengan Lulusan(Tahun)" @endif
                            required>
                        <br>

                        <div style="background-color: #f0f0f0; padding: 10px; font-weight: bold;">
                            B. IDENTITAS LULUSAN YANG DINILAI
                        </div>
                        <label for="nama">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="nama_identitaslulusan"
                            name="nama_identitaslulusan" placeholder="Nama"
                            value="{{ $penggunalulusan->nama_identitaslulusan ?? '' }}"
                            @if (!$penggunalulusan->nama_identitaslulusan) placeholder="Nama " @endif required>

                        <label for="nama">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select class="form-control form-control-user" id="jeniskelamin_identitaslulusan"
                            name="jeniskelamin_identitaslulusan" required>
                            <option value="" disabled selected>Jenis Kelamin</option>
                            <option value="Laki-laki"
                                {{ $penggunalulusan->jeniskelamin_identitaslulusan == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan"
                                {{ $penggunalulusan->jeniskelamin_identitaslulusan == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>

                        <label for="nama">Jabatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="jabatan_identitaslulusan"
                            name="jabatan_identitaslulusan" placeholder="Jabatan"
                            value="{{ $penggunalulusan->jabatan_identitaslulusan ?? '' }}"
                            @if (!$penggunalulusan->jabatan_identitaslulusan) placeholder="Jabatan" @endif required>

                        <label for="nama">Latar Belakang Pendidikan <span class="text-danger">*</span></label>
                        <select class="form-control form-control-user" id="latarbelakang_identitaslulusan"
                            name="latarbelakang_identitaslulusan" required>
                            <option value="" disabled selected>Latar Belakang Pendidikan</option>
                            <option value="Diploma III"
                                {{ $penggunalulusan->latarbelakang_identitaslulusan == 'Diploma III' ? 'selected' : '' }}>
                                Diploma III</option>
                            <option value="Diploma IV/S1"
                                {{ $penggunalulusan->latarbelakang_identitaslulusan == 'Diploma IV/S1' ? 'selected' : '' }}>
                                Diploma IV/S1</option>
                            <option value="Profesi"
                                {{ $penggunalulusan->latarbelakang_identitaslulusan == 'Profesi' ? 'selected' : '' }}>
                                Profesi</option>
                            <option value="S2"
                                {{ $penggunalulusan->latarbelakang_identitaslulusan == 'S2' ? 'selected' : '' }}>S2
                            </option>
                            <option value="S3"
                                {{ $penggunalulusan->latarbelakang_identitaslulusan == 'S3' ? 'selected' : '' }}>S3
                            </option>
                        </select>

                        <label for="nama">Total Lama Bekerja(Tahun) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="lamabekerja_identitaslulusan"
                            name="lamabekerja_identitaslulusan" placeholder="Lama bekerja Lulusan :"
                            value="{{ $penggunalulusan->lamabekerja_identitaslulusan ?? '' }}"
                            @if (!$penggunalulusan->lamabekerja_identitaslulusan) placeholder="Total Lama Bekerja(Tahun) " @endif required>

                        <label for="nama">Lama Bekerja di Instansi Saat Ini(Tahun) <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="lamabekerjadiinstansisaatini"
                            name="lamabekerjadiinstansisaatini" placeholder="Lama Bekerja di Instansi Saat Ini(Tahun)"
                            value="{{ $penggunalulusan->lamabekerjadiinstansisaatini ?? '' }}"
                            @if (!$penggunalulusan->lamabekerjadiinstansisaatini) placeholder="Lama Bekerja di Instansi Saat Ini(Tahun) " @endif
                            required>

                        <label for="nama">Saran dan Masukan <span class="text-danger">*</span></label>
                        <textarea class="form-control form-control-user" id="saranmasukkan" name="saranmasukkan"
                            placeholder="Saran dan Masukan">{{ $penggunalulusan->saranmasukkan ?? '' }}</textarea>
                        <br>
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

                                        <td>
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
