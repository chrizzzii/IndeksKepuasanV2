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
        $pertanyaanMasyarakat = PertanyaanMasyarakat::all();

        // Ambil data alumni yang sesuai (misalnya berdasarkan session user_id)
        $mitra_id = session('user_id'); // Ambil ID dari session
        $mitra = Mitra::find($mitra_id); // Ambil data alumni berdasarkan ID
        // Inisialisasi array responses
        $responses = [];
        for ($i = 1; $i <= 10; $i++) {
            $responses[$i] = $mitra->{'p' . $i}; // Mengambil data dari kolom p1 hingga p38
        }
        $responsesu = [ 
            1 => $mitra->u1,
            2 => $mitra->u2,
            3 => $mitra->u3,
            4 => $mitra->u4,
            5 => $mitra->u5,
            6 => $mitra->u6,
            7 => $mitra->u7,
            8 => $mitra->u8,
            9 => $mitra->u9,
        ];
        {
            return view('admin.pages.form.formmitra', compact('pertanyaanMitra','pertanyaanMasyarakat', 'mitra', 'responses', 'responsesu'));
        }
    }


    public function store(Request $request)
    {
        // Ambil ID dosen dari session
        $mitraId = $request->session()->get('user_id');
        $nama = $request->session()->get('user_name');

        if (!$mitraId) {
            return redirect()->back()->with('error', 'ID Dosen tidak ditemukan di session!');
        }

        // Cari alumni berdasarkan ID atau buat instance baru
        $mitra = Mitra::find($mitraId);

        if (!$mitra) {
            // Jika alumni tidak ditemukan, buat instance baru
            $mitra = new Mitra();
            $mitra->mitra_id = $mitraId; // Set ID secara manual jika diperlukan
        }

        // Set nilai properti model dari request
        $mitra->status = 1;
        $mitra->nama = $request->input('nama');
        $mitra->no_responden = $mitraId;
        $mitra->jabatan = $request->input('jabatan');
        $mitra->nama_instansi = $request->input('nama_instansi');
        $mitra->alamat = $request->input('alamat');
        $mitra->nomor_telepon = $request->input('nomor_telepon');
        if ($request->input('bidang_kerjasama') === 'other') {
            // Gunakan nilai dari input "otherbidangkerjasama"
            $mitra->bidang_kerjasama = $request->input('otherbidangkerjasama');
        } else {
            // Gunakan nilai dari input "bidang_kerjasama"
            $mitra->bidang_kerjasama = $request->input('bidang_kerjasama');
        }



        // Update nilai pertanyaan
        foreach ($request->input('pertanyaan', []) as $id => $value) {
            $column = 'p' . $id; // Menggunakan ID sebagai nomor kolom
            $mitra->$column = $value; // Mengupdate nilai kolom p1 hingga p10
        }

        foreach ($request->input('pertanyaanu', []) as $id => $value) { // Tetap menggunakan 'pertanyaanu'
            $column = 'u' . ($id);
            if ($column >= 'u1' && $column <= 'u9') {
                $mitra->$column = $value;
            }
        }



        $mitra->rencana = $request->input('rencana');
        $mitra->kota = $request->input('kota');
        $mitra->tanggal = $request->input('tanggal');
        $mitra->saranmasukkan = $request->input('saranmasukkan');

        // Simpan model ke database
        $mitra->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
