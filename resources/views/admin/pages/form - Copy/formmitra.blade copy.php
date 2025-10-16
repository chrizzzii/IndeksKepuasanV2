<!DOCTYPE html>
<html lang="en">
@extends('admin.layouts.base')

@section('title', 'Form Mitra Kerjasama')
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
                <h1 class="h3 mb-4 text-gray-800">Form Mitra</h1>
                @yield('content')
            </div>


            <form method="POST" action="{{ route('form.storemitra') }}">
                @csrf
                @if ($mitra)
                <input type="hidden" name="mitra" value="{{ session('user_id') }}">

                <label for="nama">Nama / Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="nama" name="nama"
                    placeholder="Nama" value="{{ $mitra->nama ?? '' }}"
                    @if (!$mitra->nama) placeholder="Nama " @endif required>

                <label for="nama">Jabatan / Position <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="jabatan" name="jabatan"
                    placeholder="Jabatan / Bagian (Position)" value="{{ $mitra->jabatan ?? '' }}"
                    @if (!$mitra->jabatan) placeholder="Jabatan / Bagian (Position)" @endif required>

                <label for="nama">Nama Instansi / Agency Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="nama_instansi" name="nama_instansi"
                    placeholder="Nama Instansi / Institusi (Name of Institution/Company)"
                    value="{{ $mitra->nama_instansi ?? '' }}"
                    @if (!$mitra->nama_instansi) placeholder="Nama Instansi / Institusi (Name of Institution/Company)" @endif
                required>

                <label for="nama">Alamat / Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="alamat" name="alamat"
                    placeholder="Alamat (Address)" value="{{ $mitra->alamat ?? '' }}"
                    @if (!$mitra->alamat) placeholder="Alamat (Address)" @endif required>

                <label for="nama">Nomor Telepon / Phone Number <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="nomor_telepon" name="nomor_telepon"
                    placeholder="Nomor Telepon" value="{{ $mitra->nomor_telepon ?? '' }}"
                    @if (!$mitra->nomor_telepon) placeholder="Nomor Telepon" @endif required>

                <label for="nama">Bidang Kerjasama / Field of Cooperation <span
                        class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="bidang_kerjasama" name="bidang_kerjasama"
                    onchange="checkBidangKerjasama(this)" required>
                    <option value="" disabled selected>Bidang Kerjasama (Field of Cooperation)</option>
                    <option value="Pendidikan (Praktek Klinik / PBL / PKL / Magang) / ( Education / Internship)"
                        {{ $mitra->bidang_kerjasama == 'Pendidikan (Praktek Klinik / PBL / PKL / Magang) / ( Education / Internship)' ? 'selected' : '' }}>
                        Pendidikan (Praktek Klinik / PBL / PKL / Magang) / ( Education / Internship)</option>
                    <option value="Penelitian (Research)"
                        {{ $mitra->bidang_kerjasama == 'Penelitian (Research)' ? 'selected' : '' }}>Penelitian
                        (Research)</option>
                    <option value="Pengabdian Kepada Masyarakat (Community Service Program)"
                        {{ $mitra->bidang_kerjasama == 'Pengabdian Kepada Masyarakat (Community Service Program)' ? 'selected' : '' }}>
                        Pengabdian Kepada Masyarakat (Community Service Program)</option>
                    <option value="Pendayagunaan Lulusan (Graduate's Absorption)"
                        {{ $mitra->bidang_kerjasama == "Pendayagunaan Lulusan (Graduate's Absorption)" ? 'selected' : '' }}>
                        Pendayagunaan Lulusan (Graduate's Absorption)</option>
                    <option value="Penyelenggaraan Sertifikasi Dosen (Implementation of Lecturer Certification)"
                        {{ $mitra->bidang_kerjasama == 'Penyelenggaraan Sertifikasi Dosen (Implementation of Lecturer Certification)' ? 'selected' : '' }}>
                        Penyelenggaraan Sertifikasi Dosen (Implementation of Lecturer Certification)</option>
                    <option value="Terbitan Karya Ilmiah (Published Scientific Paper)"
                        {{ $mitra->bidang_kerjasama == 'Terbitan Karya Ilmiah (Published Scientific Paper)' ? 'selected' : '' }}>
                        Terbitan Karya Ilmiah (Published Scientific Paper)</option>
                    <option value="Perbankan (Banking)"
                        {{ $mitra->bidang_kerjasama == 'Perbankan (Banking)' ? 'selected' : '' }}>Perbankan
                        (Banking)</option>
                    <option value="Pengembangan SDM (Development of Human Resource)"
                        {{ $mitra->bidang_kerjasama == 'Pengembangan SDM (Development of Human Resource)' ? 'selected' : '' }}>
                        Pengembangan SDM (Development of Human Resource)</option>
                    <option value="other"
                        {{ !in_array($mitra->bidang_kerjasama, ['Pendidikan (Praktek Klinik / PBL / PKL / Magang) / ( Education / Internship)', 'Penelitian (Research)', 'Pengabdian Kepada Masyarakat (Community Service Program)', 'Pendayagunaan Lulusan (Graduate\'s Absorption)', 'Penyelenggaraan Sertifikasi Dosen (Implementation of Lecturer Certification)', 'Terbitan Karya Ilmiah (Published Scientific Paper)', 'Perbankan (Banking)', 'Pengembangan SDM (Development of Human Resource)', 'Penggunaan fasilitas tertentu (Certain Facilities Usage)']) ? 'selected' : '' }}>
                        Lainnya (Other)</option>
                </select>

                <!-- Input untuk opsi lainnya -->
                <input type="text" class="form-control form-control-user mt-2" id="otherbidangkerjasama"
                    name="otherbidangkerjasama"
                    placeholder="Tulis bidang kerjasama lainnya / Write down other areas of collaboration"
                    style="display:none;"
                    value="{{ !in_array($mitra->bidang_kerjasama, ['Pendidikan (Praktek Klinik / PBL / PKL / Magang) / ( Education / Internship)', 'Penelitian (Research)', 'Pengabdian Kepada Masyarakat (Community Service Program)', 'Pendayagunaan Lulusan (Graduate\'s Absorption)', 'Penyelenggaraan Sertifikasi Dosen (Implementation of Lecturer Certification)', 'Terbitan Karya Ilmiah (Published Scientific Paper)', 'Perbankan (Banking)', 'Pengembangan SDM (Development of Human Resource)', 'Penggunaan fasilitas tertentu (Certain Facilities Usage)']) ? $mitra->bidang_kerjasama : '' }}">

                <script>
                    function checkBidangKerjasama(selectElement) {
                        var otherInput = document.getElementById('otherbidangkerjasama');

                        // Jika user memilih "Lainnya"
                        if (selectElement.value === 'other') {
                            otherInput.style.display = 'block'; // Tampilkan input esai
                            otherInput = true; // Jadikan input esai wajib jika opsi lainnya dipilih
                        } else {
                            otherInput.style.display = 'none'; // Sembunyikan input esai jika opsi selain "Lainnya" dipilih
                            otherInput = false; // Nonaktifkan wajib isi pada input esai
                            otherInput.value = ''; // Kosongkan nilai input esai jika tidak dipilih
                        }
                    }

                    // Jalankan fungsi ini ketika form disubmit
                    document.querySelector('form').addEventListener('submit', function(e) {
                        var selectElement = document.getElementById('bidang_kerjasama');
                        var otherInput = document.getElementById('otherbidangkerjasama');

                        // Jika opsi "Lainnya" dipilih, ganti nilai select dengan input manual jika ada nilai
                        if (selectElement.value === 'other') {
                            if (otherInput.value.trim() !== '') {
                                // Ganti nilai select dengan nilai dari input esai
                                selectElement.setAttribute('value', otherInput.value.trim());
                            } else {
                                // Hentikan form submit jika input esai kosong
                                e.preventDefault();
                                alert('Harap isi bidang kerjasama lain jika memilih "Lainnya".');
                            }
                        }
                    });



                    // Jalankan fungsi ini ketika halaman pertama kali dimuat
                    window.onload = function() {
                        checkBidangKerjasama(document.getElementById('bidang_kerjasama'));
                    };
                </script>

                <label for="nama">Kota / City <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-user" id="kota" name="kota"
                    placeholder="Kota" value="{{ $mitra->kota ?? '' }}"
                    @if (!$mitra->kota) placeholder="Kota" @endif required>

                <label for="tanggal">Tanggal/Bulan/Tahun (Date/Month/Year) <span
                        class="text-danger">*</span></label>
                <input type="date" class="form-control form-control-user" id="tanggal" name="tanggal"
                    placeholder="Tanggal" value="{{ $mitra->tanggal ?? '' }}"
                    @if (!$mitra->tanggal) placeholder="Tanggal/Bulan/Tahun (Date/Month/Year)" @endif
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
                        @foreach ($pertanyaanMitra as $pertanyaan)
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
                                    required> <!-- Tambahkan required -->
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

                <label for="nama">Rencana Tindak Lanjut/Rekomendasi (Follow-up Plan/Recommendations) <span
                        class="text-danger">*</span></label>
                <select class="form-control form-control-user" id="rencana" name="rencana" required>
                    <option value="" disabled selected>Rencana Tindak Lanjut/Rekomendasi (Continuation
                        Plan/Recommendation) </option>
                    <option value="Kerjasama akan dilanjutkan (Cooperation will be continue)"
                        {{ $mitra->rencana == 'Kerjasama akan dilanjutkan (Cooperation will be continue)' ? 'selected' : '' }}>
                        Kerjasama akan dilanjutkan (Cooperation will be continue)</option>
                    <option value="Kerjasama akan dihentikan (Cooperation will be cease)"
                        {{ $mitra->rencana == 'Kerjasama akan dihentikan (Cooperation will be cease)' ? 'selected' : '' }}>
                        Kerjasama akan dihentikan (Cooperation will be cease)</option>
                    <option
                        value="Perjanjian Kerjasama perlu dibuat adendum (The Cooperation Agreement needs to be added)"
                        {{ $mitra->rencana == 'Perjanjian Kerjasama perlu dibuat adendum (The Cooperation Agreement needs to be added)' ? 'selected' : '' }}>
                        Perjanjian Kerjasama perlu dibuat adendum (The Cooperation Agreement needs to be added)</option>
                </select>

                <label for="saranmasukkan">Saran dan Masukan</label>
                <textarea class="form-control form-control-user" id="saranmasukkan" name="saranmasukkan"
                    placeholder="Saran dan Masukan">{{ $mitra->saranmasukkan ?? '' }}</textarea>

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