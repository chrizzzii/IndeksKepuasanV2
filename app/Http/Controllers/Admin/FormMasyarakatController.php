<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PertanyaanMasyarakat;;

use App\Models\Masyarakat;

class FormMasyarakatController extends Controller
{
    public function formmasyarakat()
    {
        $pertanyaanMasyarakat = PertanyaanMasyarakat::all();
        // Inisialisasi array responses
        return view('admin.pages.form.formmasyarakat', compact('pertanyaanMasyarakat'));
    }

    public function store(Request $request)
    {

        // Cari masyarakat berdasarkan ID atau buat instance baru
        $masyarakat = Masyarakat::where('masyarakat_id')->first();

        if (!$masyarakat) {
            // Jika masyarakat tidak ditemukan, buat instance baru
            $masyarakat = new Masyarakat();

            // Mendapatkan nilai maksimal dari masyarakat_id dan no_responden yang sudah ada
            $lastMasyarakatId = Masyarakat::max('masyarakat_id');
            $lastNoResponden = Masyarakat::max('no_responden');

            // Jika tidak ada data sebelumnya, set default nilai awal 1
            $newMasyarakatId = $lastMasyarakatId ? $lastMasyarakatId + 1 : 1;
            $newNoResponden = $lastNoResponden ? $lastNoResponden + 1 : 1;

            // Set nilai masyarakat_id dan no_responden
            $masyarakat->masyarakat_id = $newMasyarakatId;
            $masyarakat->no_responden = $newNoResponden;
        }

        // Set nilai properti model dari request
        $masyarakat->status = 1;
        $masyarakat->nama = $request->input('nama');
        $masyarakat->email = $request->input('email');
        $masyarakat->role = 'masyarakat';
        $masyarakat->usia = $request->input('usia');
        $masyarakat->jeniskelamin = $request->input('jeniskelamin');
        $masyarakat->alamat = $request->input('alamat');
        $masyarakat->pekerjaan = $request->input('pekerjaan');
        $masyarakat->nomor_telepon = $request->input('nomor_telepon');
        $masyarakat->saranmasukkan = $request->input('saranmasukkan');

        // Update nilai pertanyaan
        foreach ($request->input('pertanyaan', []) as $id => $value) {
            $column = 'p' . $id; // Menggunakan ID sebagai nomor kolom
            $masyarakat->$column = $value; // Mengupdate nilai kolom p1 hingga p10
        }

        // Simpan model ke database
        $masyarakat->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
