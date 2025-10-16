<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PertanyaanAlumni;
use App\Models\PertanyaanMasyarakat;
use App\Models\Alumni;

class FormAlumniController extends Controller
{

    public function formalumni()
    {
        // Ambil semua data dari tabel pertanyaanAlumni
        $pertanyaanAlumni = PertanyaanAlumni::all();
        $pertanyaanMasyarakat = PertanyaanMasyarakat::all();
        $programStudi = config('programstudi');  // Mengambil data dari config/jurusan.php
        // Ambil data alumni yang sesuai (misalnya berdasarkan session user_id)
        $alumniId = session('user_id'); // Ambil ID dari session
        $alumni = Alumni::find($alumniId); // Ambil data alumni berdasarkan ID
        $responses = [
            12 => $alumni->p1,
            13 => $alumni->p2,
            14 => $alumni->p3,
            15 => $alumni->p4,
            16 => $alumni->p5,
            17 => $alumni->p6,
            18 => $alumni->p7,
            19 => $alumni->p8,
            20 => $alumni->p9,
        ];
        $responsesu = [
            1 => $alumni->u1,
            2 => $alumni->u2,
            3 => $alumni->u3,
            4 => $alumni->u4,
            5 => $alumni->u5,
            6 => $alumni->u6,
            7 => $alumni->u7,
            8 => $alumni->u8,
            9 => $alumni->u9,
        ];

        // Kirimkan kedua data ke view
        return view('admin.pages.form.formalumni', compact('programStudi', 'pertanyaanAlumni', 'pertanyaanMasyarakat', 'alumni', 'responses', 'responsesu'));
    }


    public function store(Request $request)
    {
        // Ambil ID alumni dari session
        $alumniId = $request->session()->get('user_id');
        $nama = $request->session()->get('user_name');

        if (!$alumniId) {
            return redirect()->back()->with('error', 'ID Alumni tidak ditemukan di session!');
        }

        // Cari alumni berdasarkan ID atau buat instance baru
        $alumni = Alumni::find($alumniId);

        if (!$alumni) {
            // Jika alumni tidak ditemukan, buat instance baru
            $alumni = new Alumni();
            $alumni->alumni_id = $alumniId; // Set ID secara manual jika diperlukan
        }

        // Set nilai properti model dari request
        $alumni->status = 1;
        $alumni->nama = $request->input('nama');
        $alumni->usia = $request->input('usia');
        $alumni->jeniskelamin = $request->input('jeniskelamin');
        $alumni->alamat = $request->input('alamat');
        $alumni->nomor_telepon = $request->input('nomor_telepon');
        $alumni->saranmasukkan = $request->input('saranmasukkan');
        $alumni->no_responden = $alumniId;
        $alumni->prodi = $request->input('prodi');
        $alumni->tahun_lulus = $request->input('tahun_lulus');
        $alumni->pekerjaan = $request->input('pekerjaan');
        $alumni->kesesuaian = $request->input('kesesuaian');
        $alumni->waktu = $request->input('waktu');
        $alumni->instansi = $request->input('instansi');
        $alumni->tempat_kerja = $request->input('tempat_kerja');
        $alumni->penghasilan = $request->input('penghasilan');
        $alumni->cara = $request->input('cara');
        $alumni->studi_lanjut = $request->input('studi_lanjut');

        // Update nilai pertanyaan
        foreach ($request->input('pertanyaan', []) as $id => $value) {
            $column = 'p' . ($id - 11); // Menggunakan id - 11 karena p1 dimulai dari pertanyaan_id 12
            if ($column >= 'p1' && $column <= 'p9') {
                $alumni->$column = $value;
            }
        }

        foreach ($request->input('pertanyaanu', []) as $id => $value) { // Tetap menggunakan 'pertanyaanu'
            $column = 'u' . ($id);
            if ($column >= 'u1' && $column <= 'u9') {
                $alumni->$column = $value;
            }
        }


        // Simpan model ke database
        $alumni->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('successsubmit', 'Data berhasil disimpan!');
    }
}
