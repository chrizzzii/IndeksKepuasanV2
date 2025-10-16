<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PertanyaanTendik;
use App\Models\PertanyaanMasyarakat;
use App\Models\Tendik;

class FormTendikController extends Controller
{
    public function formtendik()
    {
        $pertanyaanTendik = PertanyaanTendik::all();
        $pertanyaanMasyarakat = PertanyaanMasyarakat::all();

        $programStudi = config('programstudi');  // Mengambil data dari config/jurusan.php
        {
            return view('admin.pages.form.formtendik', compact('programStudi', 'pertanyaanTendik','pertanyaanMasyarakat'));
        }
    }

    public function store(Request $request)
    {

            $tendik = new Tendik();

        // Set nilai properti model dari request
        $tendik->status = 1;
        $tendik->nama = $request->input('nama');
        $tendik->nip = $request->input('nip');
        $tendik->usia = $request->input('usia');
        $tendik->jeniskelamin = $request->input('jeniskelamin');
        $tendik->alamat = $request->input('alamat');
        $tendik->nomor_telepon = $request->input('nomor_telepon');
        $tendik->saranmasukkan = $request->input('saranmasukkan');
        $tendik->prodi = $request->input('prodi');

        foreach ($request->input('pertanyaan', []) as $id => $value) {
            $column = 'p' . ($id - 1); // ID 2 menjadi p1, ID 3 menjadi p2, dst.
            $columnNumber = intval(substr($column, 1)); // Mengambil angka setelah 'p' secara numerik
            if ($columnNumber >= 1 && $columnNumber <= 30) {
                $tendik->$column = $value;
            }
        }

        foreach ($request->input('pertanyaanu', []) as $id => $value) { // Tetap menggunakan 'pertanyaanu'
            $column = 'u' . ($id);
            if ($column >= 'u1' && $column <= 'u9') {
                $tendik->$column = $value;
            }
        }

        // Simpan model ke database
        $tendik->save();


        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
