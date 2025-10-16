<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PertanyaanDosen;
use App\Models\PertanyaanMasyarakat;
use App\Models\Dosen;

class FormDosenController extends Controller
{
    public function formdosen()
    {
        $pertanyaanDosen = PertanyaanDosen::all();
        $pertanyaanMasyarakat = PertanyaanMasyarakat::all();

        $programStudi = config('programstudi');  // Mengambil data dari config/jurusan.php
      {
            return view('admin.pages.form.formdosen', compact('programStudi', 'pertanyaanDosen', 'pertanyaanMasyarakat',));
        }
    }

    public function store(Request $request)
    {
            $dosen = new Dosen();

        // Set nilai properti model dari request
        $dosen->status = 1;
        $dosen->nama = $request->input('nama');
        $dosen->nip = $request->input('nip');
        $dosen->usia = $request->input('usia');
        $dosen->jeniskelamin = $request->input('jeniskelamin');
        $dosen->alamat = $request->input('alamat');
        $dosen->nomor_telepon = $request->input('nomor_telepon');
        $dosen->saranmasukkan = $request->input('saranmasukkan');

        $dosen->prodi = $request->input('prodi');
        $dosen->prodi2 = $request->input('prodi2');
        $dosen->prodi3 = $request->input('prodi3');
        $dosen->prodi4 = $request->input('prodi4');
        $dosen->prodi5 = $request->input('prodi5');

        foreach ($request->input('pertanyaan', []) as $id => $value) {
            $column = 'p' . ($id); // ID 2 menjadi p1, ID 3 menjadi p2, dst.
            $columnNumber = intval(substr($column, 1)); // Mengambil angka setelah 'p' secara numerik
            if ($columnNumber >= 1 && $columnNumber <= 38) {
                $dosen->$column = $value;
            }
        }

        foreach ($request->input('pertanyaanu', []) as $id => $value) { // Tetap menggunakan 'pertanyaanu'
            $column = 'u' . ($id);
            if ($column >= 'u1' && $column <= 'u9') {
                $dosen->$column = $value;
            }
        }

        // Simpan model ke database
        $dosen->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Your response has been recorded!');
    }
}
