<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PertanyaanMahasiswa;
use App\Models\Mahasiswa;
use App\Models\PertanyaanMasyarakat;

class FormMahasiswaController extends Controller
{
    public function formmahasiswa()
    {
        $pertanyaanMahasiswa = PertanyaanMahasiswa::all();
        $pertanyaanMasyarakat = PertanyaanMasyarakat::all();

        // Ambil data alumni yang sesuai (misalnya berdasarkan session user_id)
        $mahasiswa_id = session('user_id'); // Ambil ID dari session
        $programStudi = config('programstudi');  // Mengambil data dari config/jurusan.php
        $mahasiswa = Mahasiswa::find($mahasiswa_id); // Ambil data alumni berdasarkan ID
        // Inisialisasi array responses
        $responses = [];
        for ($i = 1; $i <= 90; $i++) {
            $responses[$i] = $mahasiswa->{'p' . $i}; // Mengambil data dari kolom p1 hingga p38
        } 
        $responsesu = [ 
            1 => $mahasiswa->u1,
            2 => $mahasiswa->u2,
            3 => $mahasiswa->u3,
            4 => $mahasiswa->u4,
            5 => $mahasiswa->u5,
            6 => $mahasiswa->u6,
            7 => $mahasiswa->u7,
            8 => $mahasiswa->u8,
            9 => $mahasiswa->u9,
        ];
        {
            return view('admin.pages.form.formmahasiswa', compact('programStudi', 'pertanyaanMahasiswa','pertanyaanMasyarakat', 'mahasiswa', 'responses','responsesu'));
        }
    }

    public function store(Request $request)
    {
        // Ambil ID mahasiswa dari session
        $mahasiswaId = $request->session()->get('user_id');
        $nama = $request->session()->get('user_name');

        if (!$mahasiswaId) {
            return redirect()->back()->with('error', 'ID Mahasiswa tidak ditemukan di session!');
        }

        // Cari alumni berdasarkan ID atau buat instance baru
        $mahasiswa = Mahasiswa::find($mahasiswaId);

        if (!$mahasiswa) {
            // Jika alumni tidak ditemukan, buat instance baru
            $mahasiswa = new Mahasiswa();
            $mahasiswa->mahasiswa_id = $mahasiswaId; // Set ID secara manual jika diperlukan
        }

        // Set nilai properti model dari request
        $mahasiswa->status = 1;
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->usia = $request->input('usia');
        $mahasiswa->jeniskelamin = $request->input('jeniskelamin');
        $mahasiswa->nim = $request->input('nim');
        $mahasiswa->alamat = $request->input('alamat');
        $mahasiswa->nomor_telepon = $request->input('nomor_telepon');
        $mahasiswa->saranmasukkan = $request->input('saranmasukkan');
        $mahasiswa->no_responden = $mahasiswaId;
        $mahasiswa->prodi = $request->input('prodi');

        foreach ($request->input('pertanyaan', []) as $id => $value) {
            $column = 'p' . ($id); // ID 2 menjadi p1, ID 3 menjadi p2, dst.
            $columnNumber = intval(substr($column, 1)); // Mengambil angka setelah 'p' secara numerik
            if ($columnNumber >= 1 && $columnNumber <= 90) {
                $mahasiswa->$column = $value;
            }
        }

        foreach ($request->input('pertanyaanu', []) as $id => $value) { // Tetap menggunakan 'pertanyaanu'
            $column = 'u' . ($id);
            if ($column >= 'u1' && $column <= 'u9') {
                $mahasiswa->$column = $value;
            }
        }

        // Simpan model ke database
        $mahasiswa->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
