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

    <style>
        /* Wrapper untuk area checkbox */
        .checkbox-wrapper {
            background: #f8f9fa;
            /* warna abu lembut */
            border: 1px solid #dee2e6;
            /* garis halus */
            border-radius: 0.5rem;
            /* sudut membulat */
            padding: 1rem 1.25rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        /* Atur kolom dan jarak antar item */
        .form-group {
            column-count: 2;
            column-gap: 2rem;
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }

        /* Setiap item checkbox */
        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 0.6rem;
            break-inside: avoid;
        }

        /* Kotak checkbox */
        .form-check-input {
            margin-right: 0.5rem;
            margin-top: 0;
        }

        /* Teks label */
        .form-check-label {
            font-size: 0.95rem;
            color: #333;
        }

        /* Responsif: jadi 1 kolom di layar kecil */
        @media (max-width: 768px) {
            .form-group {
                column-count: 1;
            }
        }
    </style>

</head>

<body>
    @php
    $dataMitra = session('dataMitra');
    @endphp
    <div class="row">
        <div class="container">
            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800 text-center">Form Mitra</h1>

                <section class="mb-4 p-4 bg-light rounded shadow-sm mx-auto" style="max-width: 850px; text-align: justify; text-justify: inter-word;">
                    <p class="mb-4">
                        Kami menyampaikan terima kasih dan penghargaan yang sebesar-besarnya atas kesediaan Bapak/Ibu
                        untuk menjadi mitra kerjasama Poltekkes Kemenkes Semarang. Dalam upaya peningkatan kualitas pelayanan
                        kerjasama, kami mohon kesediaan Bapak/Ibu untuk mengisi kuesioner ini. Hasil isian kuesioner ini akan
                        kami gunakan bagi pengembangan dan peningkatan mutu pelayanan kami. Salam sehat, Sehat Indonesia, Bersyukur. Terima kasih.
                    </p>

                    <p class="text-muted mb-0">
                        <em>(We express our deepest gratitude and appreciation for your willingness to become partners in cooperation.
                            In order to improve the cooperation services of the Health Polytechnic of Semarang, we ask for your willingness
                            to fill out this questionnaire. The results of this questionnaire will be used for the development and
                            improvement of the quality of our services. Greetings healthy, Healthy Indonesia, Grateful. Thank you.)</em>
                    </p>
                </section>

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

                <label for="nama_instansi">Nama Instansi / Name of Institution or Company <span class="text-danger">*</span> <span><small id="nama_instansi-error" class="invalid-feedback" style="display:none;"></small>
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

                <label for="bidang_kerjasama">Bidang Kerjasama / Field of Cooperation
                    <span class="text-danger">*</span> <span><small id="bidang_kerjasama-error" class="invalid-feedback" style="display:none;"></small>
                    </span>
                </label>

                <!-- Wrapper Bidang Kerjasama -->
                <div class="checkbox-wrapper">
                    <div class="form-group" id="bidang_kerjasama">

                        @php
                        $opsiBidang = [
                        "Pendidikan (Praktek Klinik / PBL / PKL / Magang) / ( Education / Internship)",
                        "Penelitian (Research)",
                        "Pengabdian Kepada Masyarakat (Community Service Program)",
                        "Pendayagunaan Lulusan (Graduate's Absorption)",
                        "Penyelenggaraan Sertifikasi Dosen (Implementation of Lecturer Certification)",
                        "Terbitan Karya Ilmiah (Published Scientific Paper)",
                        "Perbankan (Banking)",
                        "Pengembangan SDM (Development of Human Resource)",
                        ];

                        $selectedBidang = old('bidang_kerjasama', json_decode(optional($dataMitra)->bidang_kerjasama ?? '[]', true));

                        // ambil nilai 'lainnya' yang tidak ada di daftar utama
                        $otherValue = collect($selectedBidang)
                        ->first(fn($item) => !in_array($item, $opsiBidang));
                        @endphp

                        <!-- Daftar checkbox -->
                        @foreach ($opsiBidang as $item)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="bidang_kerjasama[]"
                                value="{{ $item }}" id="{{ Str::slug($item, '-') }}"
                                {{ in_array($item, $selectedBidang) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ Str::slug($item, '-') }}">{{ $item }}</label>
                        </div>
                        @endforeach

                        <!-- Checkbox Lainnya -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="bidang_other" name="bidang_kerjasama[]" value="other"
                                {{ $otherValue ? 'checked' : '' }}>
                            <label class="form-check-label" for="bidang_other">Lainnya (Other)</label>
                        </div>

                        <!-- Input text untuk Lainnya -->
                        <input type="text" id="otherbidangkerjasama" name="otherbidangkerjasama"
                            value="{{ old('otherbidangkerjasama', $otherValue) }}"
                            class="form-control mt-2"
                            placeholder="Tuliskan bidang kerjasama lainnya / Write down other areas of collaboration"
                            style="{{ $otherValue ? 'display:block;' : 'display:none;' }}">

                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const otherCheckbox = document.getElementById('bidang_other');
                        const otherInput = document.getElementById('otherbidangkerjasama');

                        // Toggle input ketika "Lainnya" diklik
                        otherCheckbox.addEventListener('change', function() {
                            if (this.checked) {
                                otherInput.style.display = 'block';
                                otherInput.required = true;
                            } else {
                                otherInput.style.display = 'none';
                                otherInput.required = false;
                            }
                        });
                    });
                </script>


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