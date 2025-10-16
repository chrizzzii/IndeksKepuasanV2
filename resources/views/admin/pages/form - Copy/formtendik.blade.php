<!DOCTYPE html>
<html lang="en">
@extends('admin.layouts.base')

@section('title', 'Form Survei Tendik')
@section('content')


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('assets/css/from.css') }}" rel="stylesheet">

    </head>

    <body>

        <div class="row">
            <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Form Tenaga Kependidikan</h1>
                @yield('content')
            </div>

            <div class="container">
                <form method="POST" action="{{ route('form.storetendik') }}">
                    @csrf
                    @if ($tendik)
                        <input type="hidden" name="tendik" value="{{ session('user_id') }}">

                        <label for="nama">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="nama" name="nama"
                            placeholder="Nama" value="{{ $tendik->nama ?? '' }}"
                            @if (!$tendik->nama) placeholder="Nama " @endif required>

                        <label for="nama">Nomor Identitas Pegawai Negeri Sipil</label>
                        <input type="text" class="form-control form-control-user" id="nip" name="nip"
                            placeholder="Nomor Identitas Pegawai Negeri Sipil" value="{{ $tendik->nip ?? '' }}"
                            @if (!$tendik->nip) placeholder="Nomor Identitas Pegawai Negeri Sipil " @endif>

                        <label for="usia">Usia <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="usia" name="usia"
                            placeholder="Usia" value="{{ $tendik->usia ?? '' }}"
                            @if (!$tendik->usia) placeholder="Usia" @endif required>


                        <label for="jeniskelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select class="form-control form-control-user" id="jeniskelamin" name="jeniskelamin" required>
                            <option value="" disabled {{ !$tendik->jeniskelamin ? 'selected' : '' }}>Pilih Jenis
                                Kelamin</option>
                            <option value="Laki-laki"
                                {{ isset($tendik->jeniskelamin) && $tendik->jeniskelamin == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan"
                                {{ isset($tendik->jeniskelamin) && $tendik->jeniskelamin == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>

                        <label for="alamat">Alamat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat"
                            placeholder="Alamat" value="{{ $tendik->alamat ?? '' }}"
                            @if (!$tendik->alamat) placeholder="Alamat " @endif required>

                        <label for="nomor_telepon">Nomor Telepon <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-user" id="nomor_telepon" name="nomor_telepon"
                            placeholder="Nomor Telepon" value="{{ $tendik->nomor_telepon ?? '' }}"
                            @if (!$tendik->nomor_telepon) placeholder="Nomor Telepon " @endif required>

                        <label for="saranmasukkan">Saran dan Masukan</label>
                        <textarea class="form-control form-control-user" id="saranmasukkan" name="saranmasukkan"
                            placeholder="Saran dan Masukan">{{ $tendik->saranmasukkan ?? '' }}</textarea>

                        <label for="nama">Program Studi <span class="text-danger">*</span></label>
                        <select class="form-control form-control-user" id="prodi" name="prodi" required>
                            <option value="" disabled {{ !$tendik->prodi ? 'selected' : '' }}>Pilih Program Studi
                            </option>
                            @foreach ($programStudi as $jurusan => $prodis)
                                <optgroup label="{{ $jurusan }}">
                                    @foreach ($prodis as $prodi)
                                        <option value="{{ $prodi }}"
                                            {{ isset($tendik->prodi) && $tendik->prodi == $prodi ? 'selected' : '' }}>
                                            {{ $prodi }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>

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
                                @foreach ($pertanyaanTendik as $pertanyaan)
                                    @if ($pertanyaan->pertanyaan_id >= 2)
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
                                    @endif
                                @endforeach
                    @endif
                    </tbody>
                    </table>



                    <br>

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

@endsection

</html>
