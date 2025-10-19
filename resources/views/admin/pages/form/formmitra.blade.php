<!DOCTYPE html>
<html lang="en">
@extends('admin.layouts.base')

@section('title', 'Form Mitra Kerjasama')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/from.css') }}" rel="stylesheet">
    <script src="{{ asset('js/validasi/validasi-mitra.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
</head>

<body>
    @php
    $dataMitra = session('dataMitra');
    @endphp
    <div class="row">
        <div class="container">
            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">Form Mitra</h1>
                @yield('content')
            </div>

            <form method="POST" action="{{ route('form.storemitra') }}">
                @csrf
                <label for="nama">Nama / Name <span class="text-danger">*</span> <span><small id="nama-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="text" class="form-control form-control-user" id="nama" name="nama"
                    placeholder="Nama" value="{{ old('nama', optional($dataMitra)->nama) }}"
                    required>

                <label for="jabatan">Jabatan / Position <span class="text-danger">*</span> <span><small id="jabatan-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="text" class="form-control form-control-user" id="jabatan" name="jabatan"
                    placeholder="Jabatan / Bagian (Position)" value="{{ old('jabatan', optional($dataMitra)->jabatan) }}"
                    required>

                <label for="nama_instansi">Nama Instansi / Agency Name <span class="text-danger">*</span> <span><small id="nama_instansi-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="text" class="form-control form-control-user" id="nama_instansi" name="nama_instansi"
                    placeholder="Nama Instansi / Institusi (Name of Institution/Company)" value="{{ old('nama_instansi', optional($dataMitra)->nama_instansi) }}"
                    required>

                <label for="alamat">Alamat / Address <span class="text-danger">*</span> <span><small id="alamat-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="text" class="form-control form-control-user" id="alamat" name="alamat"
                    placeholder="Alamat (Address)" value="{{ old('alamat', optional($dataMitra)->alamat) }}"
                    required>

                <label for="email">Email <span class="text-danger">*</span> <span><small id="email-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="text" class="form-control form-control-user" id="email" name="email"
                    placeholder="Email" value="{{ old('email', optional($dataMitra)->email) }}"
                    required>

                <label for="nomor_telepon">Nomor Telepon / Phone Number <span class="text-danger">*</span> <span><small id="nomor_telepon-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="text" class="form-control form-control-user" id="nomor_telepon" name="nomor_telepon"
                    placeholder="Nomor Telepon" value="{{ old('nomor_telepon', optional($dataMitra)->nomor_telepon) }}"
                    required>

                <label for="bidang_kerjasama">Bidang Kerjasama / Field of Cooperation <span
                        class="text-danger">*</span> <span><small id="bidang_kerjasama-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <select class="form-control form-control-user" id="bidang_kerjasama" name="bidang_kerjasama"
                    onchange="checkBidangKerjasama(this)" required>
                    <option value="" disabled {{ old('bidang_kerjasama', optional($dataMitra)->bidang_kerjasama) ? '' : 'selected' }}>
                        Bidang Kerjasama (Field of Cooperation)
                    </option>
                    <option value="Pendidikan (Praktek Klinik / PBL / PKL / Magang) / ( Education / Internship)"
                        {{ old('bidang_kerjasama', optional($dataMitra)->bidang_kerjasama) == "Pendidikan (Praktek Klinik / PBL / PKL / Magang) / ( Education / Internship)" ? 'selected' : '' }}>
                        Pendidikan (Praktek Klinik / PBL / PKL / Magang) / ( Education / Internship)
                    </option>
                    <option value="Penelitian (Research)"
                        {{ old('bidang_kerjasama', optional($dataMitra)->bidang_kerjasama) == "Penelitian (Research)" ? 'selected' : '' }}>
                        Penelitian (Research)
                    </option>
                    <option value="Pengabdian Kepada Masyarakat (Community Service Program)"
                        {{ old('bidang_kerjasama', optional($dataMitra)->bidang_kerjasama) == "Pengabdian Kepada Masyarakat (Community Service Program)" ? 'selected' : '' }}>
                        Pengabdian Kepada Masyarakat (Community Service Program)
                    </option>
                    <option value="Pendayagunaan Lulusan (Graduate's Absorption)"
                        {{ old('bidang_kerjasama', optional($dataMitra)->bidang_kerjasama) == "Pendayagunaan Lulusan (Graduate's Absorption)" ? 'selected' : '' }}>
                        Pendayagunaan Lulusan (Graduate's Absorption)
                    </option>
                    <option value="Penyelenggaraan Sertifikasi Dosen (Implementation of Lecturer Certification)"
                        {{ old('bidang_kerjasama', optional($dataMitra)->bidang_kerjasama) == "Penyelenggaraan Sertifikasi Dosen (Implementation of Lecturer Certification)" ? 'selected' : '' }}>
                        Penyelenggaraan Sertifikasi Dosen (Implementation of Lecturer Certification)
                    </option>
                    <option value="Terbitan Karya Ilmiah (Published Scientific Paper)"
                        {{ old('bidang_kerjasama', optional($dataMitra)->bidang_kerjasama) == "Terbitan Karya Ilmiah (Published Scientific Paper)" ? 'selected' : '' }}>
                        Terbitan Karya Ilmiah (Published Scientific Paper)
                    </option>
                    <option value="Perbankan (Banking)"
                        {{ old('bidang_kerjasama', optional($dataMitra)->bidang_kerjasama) == "Perbankan (Banking)" ? 'selected' : '' }}>
                        Perbankan (Banking)
                    </option>
                    <option value="Pengembangan SDM (Development of Human Resource)"
                        {{ old('bidang_kerjasama', optional($dataMitra)->bidang_kerjasama) == "Pengembangan SDM (Development of Human Resource)" ? 'selected' : '' }}>
                        Pengembangan SDM (Development of Human Resource)
                    </option>
                    <option value="other"
                        {{ !in_array(old('bidang_kerjasama', optional($dataMitra)->bidang_kerjasama), [
    "Pendidikan (Praktek Klinik / PBL / PKL / Magang) / ( Education / Internship)",
    "Penelitian (Research)",
    "Pengabdian Kepada Masyarakat (Community Service Program)",
    "Pendayagunaan Lulusan (Graduate's Absorption)",
    "Penyelenggaraan Sertifikasi Dosen (Implementation of Lecturer Certification)",
    "Terbitan Karya Ilmiah (Published Scientific Paper)",
    "Perbankan (Banking)",
    "Pengembangan SDM (Development of Human Resource)"
]) ? 'selected' : '' }}>
                        Lainnya (Other)
                    </option>
                </select>

                @if (old('bidang_kerjasama', optional($dataMitra)->bidang_kerjasama) == 'other')
                <input type="text" id="otherbidangkerjasama" name="otherbidangkerjasama"
                    value="{{ old('otherbidangkerjasama', optional($dataMitra)->bidang_kerjasama) }}"
                    class="form-control mt-2" placeholder="Tuliskan bidang kerjasama lainnya">
                @endif


                <!-- Input untuk opsi lainnya -->
                @php
                $opsiUtama = [
                "Pendidikan (Praktek Klinik / PBL / PKL / Magang) / ( Education / Internship)",
                "Penelitian (Research)",
                "Pengabdian Kepada Masyarakat (Community Service Program)",
                "Pendayagunaan Lulusan (Graduate's Absorption)",
                "Penyelenggaraan Sertifikasi Dosen (Implementation of Lecturer Certification)",
                "Terbitan Karya Ilmiah (Published Scientific Paper)",
                "Perbankan (Banking)",
                "Pengembangan SDM (Development of Human Resource)"
                ];

                $isOther = !in_array(optional($dataMitra)->bidang_kerjasama, $opsiUtama);
                @endphp

                <input
                    type="text"
                    class="form-control form-control-user mt-2"
                    id="otherbidangkerjasama"
                    name="otherbidangkerjasama"
                    value="{{ old('otherbidangkerjasama', $isOther ? optional($dataMitra)->bidang_kerjasama : '') }}"
                    placeholder="Tulis bidang kerjasama lainnya / Write down other areas of collaboration"
                    @if($isOther)
                    style="display:block;"
                    @else
                    style="display:none;"
                    @endif>

                <script>
                    function checkBidangKerjasama(selectElement) {
                        var otherInput = document.getElementById('otherbidangkerjasama');

                        if (selectElement.value === 'other') {
                            otherInput.style.display = 'block';
                            otherInput.required = true;
                        } else {
                            otherInput.style.display = 'none';
                            otherInput.required = false;
                            otherInput.value = '';
                        }

                    }

                    // Jalankan fungsi ini ketika form disubmit
                    document.querySelector('form').addEventListener('submit', function(e) {
                        var selectElement = document.getElementById('bidang_kerjasama');
                        var otherInput = document.getElementById('otherbidangkerjasama');

                        // Jika opsi "Lainnya" dipilih, ganti nilai select dengan input manual jika ada nilai
                        if (selectElement.value === 'other') {
                            if (otherInput.value.trim() === '') {
                                e.preventDefault();
                                alert('Harap isi bidang kerjasama lain jika memilih "Lainnya".');
                                return false;
                            }
                            // Biarkan name="otherbidangkerjasama" yang dikirim
                        }

                    });



                    // Jalankan fungsi ini ketika halaman pertama kali dimuat
                    window.onload = function() {
                        checkBidangKerjasama(document.getElementById('bidang_kerjasama'));
                    };
                </script>

                <label for="kota">Kota / City <span class="text-danger">*</span> <span><small id="kota-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="text" class="form-control form-control-user" id="kota" name="kota"
                    placeholder="Kota" value="{{ old('kota', optional($dataMitra)->kota) }}"
                    required>

                <label for="tanggal">Tanggal/Bulan/Tahun (Date/Month/Year) <span
                        class="text-danger">*</span> <span><small id="tanggal-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <input type="date" class="form-control form-control-user" id="tanggal" name="tanggal"
                    placeholder="Tanggal" value="{{ old('tanggal', optional($dataMitra)->tanggal) }}"
                    required>

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
                        @foreach ($pertanyaanMitra as $pertanyaan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pertanyaan->pertanyaan }}</td>
                            <td style="text-align:center;">
                                @foreach ([1,2,3,4] as $value)
                                <input type="radio"
                                    id="pertanyaan_{{ $pertanyaan->pertanyaan_id }}_{{ $value }}"
                                    name="pertanyaan[{{ $pertanyaan->pertanyaan_id }}]"
                                    value="{{ $value }}"
                                    {{ isset($responses[$pertanyaan->pertanyaan_id]) && $responses[$pertanyaan->pertanyaan_id] == $value ? 'checked' : '' }}
                                    required>
                                <label for="pertanyaan_{{ $pertanyaan->pertanyaan_id }}_{{ $value }}">{{ $value }}</label>
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
                        @foreach ($pertanyaanMasyarakat as $pertanyaan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pertanyaan->pertanyaan }}</td>
                            <td style="text-align:center;">
                                @foreach ([1,2,3,4] as $value)
                                <input type="radio"
                                    id="pertanyaanu_{{ $pertanyaan->pertanyaan_id }}_{{ $value }}"
                                    name="pertanyaanu[{{ $pertanyaan->pertanyaan_id }}]"
                                    value="{{ $value }}"
                                    {{ isset($responsesu[$pertanyaan->pertanyaan_id]) && $responsesu[$pertanyaan->pertanyaan_id] == $value ? 'checked' : '' }}
                                    required>
                                <label for="pertanyaanu_{{ $pertanyaan->pertanyaan_id }}_{{ $value }}">{{ $value }}</label>
                                @endforeach
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                <hr>

                <label for="rencana">Rencana Tindak Lanjut/Rekomendasi (Follow-up Plan/Recommendations) <span
                        class="text-danger">*</span> <span><small id="rencana-error" class="invalid-feedback" style="display:none;"></small>
                    </span></label>
                <select class="form-control form-control-user" id="rencana" name="rencana" required>
                    <option value="" disabled {{ old('rencana', optional($dataMitra)->rencana) ? '' : 'selected' }}>
                        Rencana Tindak Lanjut/Rekomendasi (Continuation Plan/Recommendation)
                    </option>
                    <option value="Kerjasama akan dilanjutkan (Cooperation will be continue)"
                        {{ old('rencana', optional($dataMitra)->rencana) == 'Kerjasama akan dilanjutkan (Cooperation will be continue)' ? 'selected' : '' }}>
                        Kerjasama akan dilanjutkan (Cooperation will be continue)
                    </option>
                    <option value="Kerjasama akan dihentikan (Cooperation will be cease)"
                        {{ old('rencana', optional($dataMitra)->rencana) == 'Kerjasama akan dihentikan (Cooperation will be cease)' ? 'selected' : '' }}>
                        Kerjasama akan dihentikan (Cooperation will be cease)
                    </option>
                    <option value="Perjanjian Kerjasama perlu dibuat adendum (The Cooperation Agreement needs to be added)"
                        {{ old('rencana', optional($dataMitra)->rencana) == 'Perjanjian Kerjasama perlu dibuat adendum (The Cooperation Agreement needs to be added)' ? 'selected' : '' }}>
                        Perjanjian Kerjasama perlu dibuat adendum (The Cooperation Agreement needs to be added)
                    </option>
                </select>


                <label for="saranmasukkan">Saran dan Masukan</label> <span><small id="saranmasukkan-count" class="text-muted">0 / 255 karakter</small></span> <span><small id="saranmasukkan-error" class="invalid-feedback" style="display:none;"></small>
                </span>
                <textarea class="form-control form-control-user" id="saranmasukkan" name="saranmasukkan"
                    placeholder="Saran dan Masukan" value="{{ old('email', optional($dataMitra)->saranmasukkan) }}"></textarea>

                <hr>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>
</body>

@include('admin.layouts.footer')
@endsection

</html>