<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PertanyaanMahasiswa;
use App\Models\Mahasiswa;
use App\Models\PertanyaanMasyarakat;

class FormMahasiswaController extends Controller
{
    public function formmahasiswa()
    {
        $pertanyaanMahasiswa = PertanyaanMahasiswa::all();
        $pertanyaanMasyarakat = PertanyaanMasyarakat::all();

        $programStudi = config('programstudi');  // Mengambil data dari config/jurusan.php

        $responses = [];
        $responsesu = [];

        // Ambil data dari session (redirect after submitCluster)
        $email = session('dataMahasiswa'); // sesuai session kamu

        if ($email) {
            // p1–p90
            for ($i = 1; $i <= 90; $i++) {
                $responses[$i] = $email->{'p' . $i} ?? null;
            }

            // u1–u9
            for ($i = 1; $i <= 9; $i++) {
                $responsesu[$i] = $email->{'u' . $i} ?? null;
            }
        }

        return view('admin.pages.form.formmahasiswa', compact(
            'pertanyaanMahasiswa',
            'pertanyaanMasyarakat',
            'programStudi',
            'responses',
            'responsesu'
        ));
    }

    public function store(Request $request)
    {
        $email = $request->input('email');

        // Cek apakah data mahasiswa dengan email ini sudah ada
        $mahasiswa = Mahasiswa::where('email', $email)->first();

        if (!$mahasiswa) {
            $mahasiswa = new Mahasiswa();
            $mahasiswa->email = $email;
        }

        // Set nilai properti model dari request
        $mahasiswa->status = 1;
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->usia = $request->input('usia');
        $mahasiswa->jeniskelamin = $request->input('jeniskelamin');
        $mahasiswa->nim = $request->input('nim');
        $mahasiswa->alamat = $request->input('alamat');
        $mahasiswa->nomor_telepon = $request->input('nomor_telepon');
        $mahasiswa->saranmasukkan = $request->input('saranmasukkan');
        $mahasiswa->prodi = $request->input('prodi');


        foreach ($request->input('pertanyaan', []) as $id => $value) {
            $column = 'p' . ($id); // ID 2 menjadi p1, ID 3 menjadi p2, dst.
            $columnNumber = intval(substr($column, 1)); // Mengambil angka setelah 'p' secara numerik
            if ($columnNumber >= 1 && $columnNumber <= 90) {
                $mahasiswa->$column = $value;
            }
        }

        foreach ($request->input('pertanyaanu', []) as $id => $value) { // Tetap menggunakan 'pertanyaanu'
            $column = 'u' . ($id);
            if ($column >= 'u1' && $column <= 'u9') {
                $mahasiswa->$column = $value;
            }
        }

        // Simpan model ke database
        $mahasiswa->save();

        // Redirect atau tampilkan pesan sukses
        $message = $mahasiswa->wasRecentlyCreated ? 'Data mahasiswa berhasil ditambahkan!' : 'Data mahasiswa berhasil diperbarui!';
        return redirect()->back()->with('success', $message);
    }
}
