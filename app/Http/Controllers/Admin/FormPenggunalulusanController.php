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
 {
            return view('admin.pages.form.formpenggunalulusan', compact('pertanyaanPenggunalulusan', 'pertanyaanMasyarakat',));
        }
    }

    public function store(Request $request)
    {
            $penggunalulusan = new Penggunalulusan();


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
        return redirect()->back()->with('success', 'Your response has been recorded!');
    }
}
