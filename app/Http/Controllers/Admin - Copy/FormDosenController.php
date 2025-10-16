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

        // Ambil data alumni yang sesuai (misalnya berdasarkan session user_id)
        $dosen_id = session('user_id'); // Ambil ID dari session
        $programStudi = config('programstudi');  // Mengambil data dari config/jurusan.php
        $dosen = Dosen::find($dosen_id); // Ambil data alumni berdasarkan ID
        // Inisialisasi array responses
        $responses = [];
        for ($i = 1; $i <= 38; $i++) {
            $responses[$i] = $dosen->{'p' . $i}; // Menyesuaikan index
        }
        $responsesu = [
            1 => $dosen->u1,
            2 => $dosen->u2,
            3 => $dosen->u3,
            4 => $dosen->u4,
            5 => $dosen->u5,
            6 => $dosen->u6,
            7 => $dosen->u7,
            8 => $dosen->u8,
            9 => $dosen->u9,
        ]; {
            return view('admin.pages.form.formdosen', compact('programStudi', 'pertanyaanDosen', 'pertanyaanMasyarakat', 'dosen', 'responses', 'responsesu'));
        }
    }

    public function store(Request $request)
    {
        // Ambil ID dosen dari session
        $dosenId = $request->session()->get('user_id');
        $nama = $request->session()->get('user_name');

        if (!$dosenId) {
            return redirect()->back()->with('error', 'ID Dosen tidak ditemukan di session!');
        }

        // Cari alumni berdasarkan ID atau buat instance baru
        $dosen = Dosen::find($dosenId);

        if (!$dosen) {
            // Jika alumni tidak ditemukan, buat instance baru
            $dosen = new Dosen();
            $dosen->dosen_id = $dosenId; // Set ID secara manual jika diperlukan
        }

        // Set nilai properti model dari request
        $dosen->status = 1;
        $dosen->nama = $request->input('nama');
        $dosen->nip = $request->input('nip');
        $dosen->usia = $request->input('usia');
        $dosen->jeniskelamin = $request->input('jeniskelamin');
        $dosen->alamat = $request->input('alamat');
        $dosen->nomor_telepon = $request->input('nomor_telepon');
        $dosen->saranmasukkan = $request->input('saranmasukkan');
        $dosen->no_responden = $dosenId;
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
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
