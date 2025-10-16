<!DOCTYPE html>
<html lang="en">
@extends('admin.layouts.base')

@section('title', 'Form Survei Masyarakat')
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
                    <h1 class="h3 mb-4 text-gray-800">Form Masyarakat</h1>
                    @yield('content')
                </div>
                <form method="POST" action="{{ route('form.storemasyarakat') }}">
                    @csrf

                    <label for="nama">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-user" id="nama" name="nama"
                        placeholder="Nama" required>

                    <label for="usia">Usia <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-user" id="usia" name="usia"
                        placeholder="Usia" required>

                    <label for="jeniskelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                    <select class="form-control form-control-user" id="jeniskelamin" name="jeniskelamin" required>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>

                    <label for="alamat">Alamat <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat"
                        placeholder="Alamat" required>

                    <label for="alamat">Pekerjaan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-user" id="pekerjaan" name="pekerjaan"
                        placeholder="Pekerjaan" required>

                    <label for="nama">Email <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-user" id="email" name="email"
                        placeholder="Email" required>

                    <label for="nomor_telepon">Nomor Telepon <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-user" id="nomor_telepon" name="nomor_telepon"
                        placeholder="Nomor Telepon" required>

                    <label for="saranmasukkan">Saran dan Masukan</label>
                    <textarea class="form-control form-control-user" id="saranmasukkan" name="saranmasukkan"
                        placeholder="Saran dan Masukan"></textarea>


                    <br>

                    <table></table>
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
