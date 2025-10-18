<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PertanyaanOrangTua;
use App\Models\PertanyaanMasyarakat;
use App\Models\OrangTua;

class FormOrangtuaController extends Controller
{
    public function formorangtua()
    {
        $pertanyaanOrangtua = PertanyaanOrangTua::all();
        $pertanyaanMasyarakat = PertanyaanMasyarakat::all();

        $programStudi = config('programstudi');  // Mengambil data dari config/jurusan.php
        {
            return view('admin.pages.form.formorangtua', compact('programStudi', 'pertanyaanOrangtua','pertanyaanMasyarakat'));
        }
    }

    public function store(Request $request)
    {

            $orangtua = new OrangTua();

        // Set nilai properti model dari request
        $orangtua->status = 1;
        $orangtua->nama = $request->input('nama');
        $orangtua->usia = $request->input('usia');
        $orangtua->email = $request->input('email');
        $orangtua->jeniskelamin = $request->input('jeniskelamin');
        $orangtua->pekerjaan = $request->input('pekerjaan');
        $orangtua->alamat = $request->input('alamat');
        $orangtua->nomor_telepon = $request->input('nomor_telepon');
        $orangtua->saranmasukkan = $request->input('saranmasukkan');
        $orangtua->prodi = $request->input('prodi');

        foreach ($request->input('pertanyaan', []) as $id => $value) {
            $column = 'p' . ($id - 2); // ID 2 menjadi p1, ID 3 menjadi p2, dst.
            $columnNumber = intval(substr($column, 1)); // Mengambil angka setelah 'p' secara numerik
            if ($columnNumber >= 1 && $columnNumber <= 30) {
                $orangtua->$column = $value;
            }
        }

        foreach ($request->input('pertanyaanu', []) as $id => $value) { // Tetap menggunakan 'pertanyaanu'
            $column = 'u' . ($id);
            if ($column >= 'u1' && $column <= 'u9') {
                $orangtua->$column = $value;
            }
        }

        // Simpan model ke database
        $orangtua->save();


        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
