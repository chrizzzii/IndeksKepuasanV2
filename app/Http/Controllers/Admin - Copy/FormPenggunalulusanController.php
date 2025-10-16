<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PertanyaanPenggunalulusan;
use App\Models\PertanyaanMasyarakat;
use App\Models\Penggunalulusan;

class FormPenggunalulusanController extends Controller
{
    public function formpenggunalulusan()
    {
        $pertanyaanPenggunalulusan = PertanyaanPenggunalulusan::all();
        $pertanyaanMasyarakat = PertanyaanMasyarakat::all();

        // Ambil data alumni yang sesuai (misalnya berdasarkan session user_id)
        $penggunalulusan_id = session('user_id'); // Ambil ID dari session
        $penggunalulusan = Penggunalulusan::find($penggunalulusan_id); // Ambil data alumni berdasarkan ID
        // Inisialisasi array responses
        $responses = [];
        for ($i = 1; $i <= 26; $i++) {
            $responses[$i] = $penggunalulusan->{'p' . $i}; // Menyesuaikan index
        } 
        $responsesu = [ 
            1 => $penggunalulusan->u1,
            2 => $penggunalulusan->u2,
            3 => $penggunalulusan->u3,
            4 => $penggunalulusan->u4,
            5 => $penggunalulusan->u5,
            6 => $penggunalulusan->u6,
            7 => $penggunalulusan->u7,
            8 => $penggunalulusan->u8,
            9 => $penggunalulusan->u9,
        ];
        {
            return view('admin.pages.form.formpenggunalulusan', compact('pertanyaanPenggunalulusan','pertanyaanMasyarakat', 'penggunalulusan', 'responses','responsesu'));
        }
    }

    public function store(Request $request)
    {
        // Ambil ID tendik dari session
        $penggunalulusanId = $request->session()->get('user_id');
        $nama = $request->session()->get('user_name');

        if (!$penggunalulusanId) {
            return redirect()->back()->with('error', 'ID Tendik tidak ditemukan di session!');
        }

        // Cari alumni berdasarkan ID atau buat instance baru
        $penggunalulusan = Penggunalulusan::find($penggunalulusanId);

        if (!$penggunalulusan) {
            // Jika alumni tidak ditemukan, buat instance baru
            $penggunalulusan = new Penggunalulusan();
            $penggunalulusan->penggunalulusanId = $penggunalulusanId; // Set ID secara manual jika diperlukan
        }

        // Set nilai properti model dari request
        $penggunalulusan->status = 1;
        $penggunalulusan->nama_identitaspenilai = $request->input('nama_identitaspenilai');
        $penggunalulusan->usia_identitaspenilai = $request->input('usia_identitaspenilai');
        $penggunalulusan->alamat_identitaspenilai = $request->input('alamat_identitaspenilai');
        $penggunalulusan->jeniskelamin_identitaspenilai = $request->input('jeniskelamin_identitaspenilai');
        $penggunalulusan->instansi_identitaspenilai = $request->input('instansi_identitaspenilai');
        $penggunalulusan->jabatan_identitaspenilai = $request->input('jabatan_identitaspenilai');
        $penggunalulusan->kontak_identitaspenilai = $request->input('kontak_identitaspenilai');
        $penggunalulusan->lamabekerjadenganlulusan = $request->input('lamabekerjadenganlulusan');
        $penggunalulusan->nama_identitaslulusan = $request->input('nama_identitaslulusan');
        $penggunalulusan->jeniskelamin_identitaslulusan = $request->input('jeniskelamin_identitaslulusan');
        $penggunalulusan->jabatan_identitaslulusan = $request->input('jabatan_identitaslulusan');
        $penggunalulusan->latarbelakang_identitaslulusan = $request->input('latarbelakang_identitaslulusan');
        $penggunalulusan->lamabekerja_identitaslulusan = $request->input('lamabekerja_identitaslulusan');
        $penggunalulusan->lamabekerjadiinstansisaatini = $request->input('lamabekerjadiinstansisaatini');
        $penggunalulusan->saranmasukkan = $request->input('saranmasukkan');


        foreach ($request->input('pertanyaan', []) as $id => $value) {
            $column = 'p' . ($id); // ID 2 menjadi p1, ID 3 menjadi p2, dst.
            $columnNumber = intval(substr($column, 1)); // Mengambil angka setelah 'p' secara numerik
            if ($columnNumber >= 1 && $columnNumber <= 21) {
                $penggunalulusan->$column = $value;
            }
        }

        foreach ($request->input('pertanyaanu', []) as $id => $value) { // Tetap menggunakan 'pertanyaanu'
            $column = 'u' . ($id);
            if ($column >= 'u1' && $column <= 'u9') {
                $penggunalulusan->$column = $value;
            }
        }

        // Simpan model ke database
        $penggunalulusan->save();


        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
