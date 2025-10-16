<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PertanyaanMitra;
use App\Models\PertanyaanMasyarakat;
use App\Models\Mitra;

class FormMitraController extends Controller
{
    public function formmitra()
    {
        $pertanyaanMitra = PertanyaanMitra::all();
        $pertanyaanMasyarakat = PertanyaanMasyarakat::all(); {
            return view('admin.pages.form.formmitra', compact('pertanyaanMitra', 'pertanyaanMasyarakat'));
        }
    }


    public function store(Request $request)
    {
        $mitra = new Mitra();

        // Set nilai properti model dari request
        $mitra->status = 1;
        $mitra->nama = $request->input('nama');

        $maxNoResponden = Mitra::max('no_responden');
        $mitra->no_responden = $maxNoResponden ? $maxNoResponden + 1 : 1;

        $mitra->jabatan = $request->input('jabatan');
        $mitra->nama_instansi = $request->input('nama_instansi');
        $mitra->alamat = $request->input('alamat');
        $mitra->email = $request->input('email');
        $mitra->nomor_telepon = $request->input('nomor_telepon');
        if ($request->input('bidang_kerjasama') === 'other') {
            // Gunakan nilai dari input "otherbidangkerjasama"
            $mitra->bidang_kerjasama = $request->input('otherbidangkerjasama');
        } else {
            // Gunakan nilai dari input "bidang_kerjasama"
            $mitra->bidang_kerjasama = $request->input('bidang_kerjasama');
        }



        // Update nilai pertanyaan untuk Mitra
        foreach ($request->input('pertanyaan', []) as $id => $value) {
            $column = 'p' . $id; // Kolom p1 hingga p10
            $mitra->$column = $value; // Mengupdate nilai kolom
        }

        // Update nilai pertanyaan untuk Masyarakat
        foreach ($request->input('pertanyaanu', []) as $id => $value) {
            $column = 'u' . $id; // Kolom u1 hingga u9
            $mitra->$column = $value; // Mengupdate nilai kolom
        }




        $mitra->rencana = $request->input('rencana');
        $mitra->kota = $request->input('kota');
        $mitra->tanggal = $request->input('tanggal');
        $mitra->saranmasukkan = $request->input('saranmasukkan');

        ($mitra);

        // Simpan model ke database
        $mitra->save();

        // Redirect atau tampilkan pesan sukses

        // Redirect ke halaman login setelah logout
        return redirect('/');
    }
}
