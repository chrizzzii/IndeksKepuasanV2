<!DOCTYPE html>
<html lang="en">
@extends('admin.layouts.base')

@section('title', 'Form Survei Mahasiswa')
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
                    <h1 class="h3 mb-4 text-gray-800">Form Mahasiswa</h1>
                    @yield('content')
                </div>
                <form method="POST" action="{{ route('form.storemahasiswa') }}">
                    @csrf
                    @if ($mahasiswa)
                        <input type="hidden" name="mahasiswa" value="{{ session('user_id') }}">

                        <label for="nama">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="nama" name="nama"
                            placeholder="Nama" value="{{ $mahasiswa->nama ?? '' }}"
                            @if (!$mahasiswa->nama) placeholder="Nama " @endif required>

                        <label for="nama">Nomor Induk Mahasiswa <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="nim" name="nim"
                            placeholder="Nomor Induk Mahasiswa" value="{{ $mahasiswa->nim ?? '' }}"
                            @if (!$mahasiswa->nim) placeholder="Nomor Induk Mahasiswa " @endif required>

                        <label for="usia">Usia <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="usia" name="usia"
                            placeholder="Usia" value="{{ $mahasiswa->usia ?? '' }}"
                            @if (!$mahasiswa->usia) placeholder="Usia" @endif required>


                        <label for="jeniskelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select class="form-control form-control-user" id="jeniskelamin" name="jeniskelamin" required>
                            <option value="" disabled {{ !$mahasiswa->jeniskelamin ? 'selected' : '' }}>Pilih Jenis
                                Kelamin</option>
                            <option value="Laki-laki"
                                {{ isset($mahasiswa->jeniskelamin) && $mahasiswa->jeniskelamin == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan"
                                {{ isset($mahasiswa->jeniskelamin) && $mahasiswa->jeniskelamin == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>

                        <label for="alamat">Alamat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat"
                            placeholder="Alamat" value="{{ $mahasiswa->alamat ?? '' }}"
                            @if (!$mahasiswa->alamat) placeholder="Alamat " @endif required>

                        <label for="nomor_telepon">Nomor Telepon <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="nomor_telepon" name="nomor_telepon"
                            placeholder="Nomor Telepon" value="{{ $mahasiswa->nomor_telepon ?? '' }}"
                            @if (!$mahasiswa->nomor_telepon) placeholder="Nomor Telepon " @endif required>

                        <label for="saranmasukkan">Saran dan Masukan</label>
                        <textarea class="form-control form-control-user" id="saranmasukkan" name="saranmasukkan"
                            placeholder="Saran dan Masukan">{{ $mahasiswa->saranmasukkan ?? '' }}</textarea>


                        <label for="nama">Program Studi <span class="text-danger">*</span></label>
                        <select class="form-control form-control-user" id="prodi" name="prodi" required>
                            <option value="" disabled {{ !$mahasiswa->prodi ? 'selected' : '' }}>Pilih Program Studi
                            </option>
                            @foreach ($programStudi as $jurusan => $prodis)
                                <optgroup label="{{ $jurusan }}">
                                    @foreach ($prodis as $prodi)
                                        <option value="{{ $prodi }}"
                                            {{ isset($mahasiswa->prodi) && $mahasiswa->prodi == $prodi ? 'selected' : '' }}>
                                            {{ $prodi }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>

                        <br />
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
                                @php $no = 1; @endphp <!-- Variabel untuk nomor urut -->
                                @foreach ($pertanyaanMahasiswa as $pertanyaan)
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
                    <hr>
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
