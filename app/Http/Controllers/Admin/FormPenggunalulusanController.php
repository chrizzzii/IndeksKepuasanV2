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

        $responses = [];
        $responsesu = [];

        $email = session('dataPenggunaLulusan');

        $dataPenggunaLulusan = null;

        if ($email) {
            for ($i = 1; $i <= 21; $i++) {
                $responses[$i] = $email->{'p' . $i};
            }

            for ($i = 1; $i <= 9; $i++) {
                $responsesu[$i] = $email->{'u' . $i};
            }
        }

        return view('admin.pages.form.formpenggunalulusan', compact(
            'pertanyaanPenggunalulusan',
            'pertanyaanMasyarakat',
            'responses',
            'responsesu',
            'dataPenggunaLulusan'
        ));
    }


    public function store(Request $request)
    {
        $email = $request->input('email');

        // Cari data lama berdasarkan email
        $penggunalulusan = Penggunalulusan::where('email', $email)->first();

        // Kalau belum ada, buat baru
        if (!$penggunalulusan) {
            $penggunalulusan = new Penggunalulusan();
            $penggunalulusan->status = 1;
        }

        // Set nilai properti model dari request
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
        $penggunalulusan->email = $email;



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

        $penggunalulusan->save();

        $message = $penggunalulusan->wasRecentlyCreated
            ? 'Data pengguna lulusan berhasil ditambahkan!'
            : 'Data pengguna lulusan berhasil diperbarui!';

        return redirect()->back()->with('success', $message);
    }
}
