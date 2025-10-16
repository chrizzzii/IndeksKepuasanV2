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

        {
            return view('admin.pages.form.formmahasiswa', compact('programStudi', 'pertanyaanMahasiswa', 'pertanyaanMasyarakat'));
        }
    }

    public function store(Request $request)
    {
        $mahasiswa = new Mahasiswa();

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
        return redirect()->back()->with('success', 'Your response has been recorded!');
    }
}
