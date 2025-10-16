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

        // Ambil data alumni yang sesuai (misalnya berdasarkan session user_id)
        $tendik_id = session('user_id'); // Ambil ID dari session
        $programStudi = config('programstudi');  // Mengambil data dari config/jurusan.php
        $tendik = Tendik::find($tendik_id); // Ambil data alumni berdasarkan ID
        // Inisialisasi array responses
        $responses = [];
        for ($i = 1; $i <= 26; $i++) {
            $responses[$i + 1] = $tendik->{'p' . $i}; // Menyesuaikan index
        } 
        $responsesu = [ 
            1 => $tendik->u1,
            2 => $tendik->u2,
            3 => $tendik->u3,
            4 => $tendik->u4,
            5 => $tendik->u5,
            6 => $tendik->u6,
            7 => $tendik->u7,
            8 => $tendik->u8,
            9 => $tendik->u9,
        ];
        
        {
            return view('admin.pages.form.formtendik', compact('programStudi', 'pertanyaanTendik','pertanyaanMasyarakat', 'tendik', 'responses','responsesu'));
        }
    }

    public function store(Request $request)
    {
        // Ambil ID tendik dari session
        $tendikId = $request->session()->get('user_id');
        $nama = $request->session()->get('user_name');

        if (!$tendikId) {
            return redirect()->back()->with('error', 'ID Tendik tidak ditemukan di session!');
        }

        // Cari alumni berdasarkan ID atau buat instance baru
        $tendik = Tendik::find($tendikId);

        if (!$tendik) {
            // Jika alumni tidak ditemukan, buat instance baru
            $tendik = new Tendik();
            $tendik->tendik_id = $tendikId; // Set ID secara manual jika diperlukan
        }

        // Set nilai properti model dari request
        $tendik->status = 1;
        $tendik->nama = $request->input('nama');
        $tendik->nip = $request->input('nip');
        $tendik->usia = $request->input('usia');
        $tendik->jeniskelamin = $request->input('jeniskelamin');
        $tendik->alamat = $request->input('alamat');
        $tendik->nomor_telepon = $request->input('nomor_telepon');
        $tendik->saranmasukkan = $request->input('saranmasukkan');
        $tendik->no_responden = $tendikId;
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
