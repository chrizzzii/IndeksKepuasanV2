<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PertanyaanAlumni;
use App\Models\PertanyaanMasyarakat;
use App\Models\Alumni;

class FormAlumniController extends Controller
{

    public function formalumni()
    {
        // Ambil semua data dari tabel pertanyaanAlumni
        $pertanyaanAlumni = PertanyaanAlumni::all();
        $pertanyaanMasyarakat = PertanyaanMasyarakat::all();
        $programStudi = config('programstudi');  // Mengambil data dari config/jurusan.php

        // Kirimkan kedua data ke view
        return view('admin.pages.form.formalumni', compact('programStudi', 'pertanyaanAlumni', 'pertanyaanMasyarakat',));
    }


    public function store(Request $request)
    {
        $alumni = new Alumni();


        // Set nilai properti model dari request
        $alumni->status = 1;
        $alumni->nama = $request->input('nama');
        $alumni->usia = $request->input('usia');
        $alumni->jeniskelamin = $request->input('jeniskelamin');
        $alumni->alamat = $request->input('alamat');
        $alumni->nomor_telepon = $request->input('nomor_telepon');
        $alumni->saranmasukkan = $request->input('saranmasukkan');
        $alumni->prodi = $request->input('prodi');
        $alumni->tahun_lulus = $request->input('tahun_lulus');
        $alumni->pekerjaan = $request->input('pekerjaan');
        $alumni->kesesuaian = $request->input('kesesuaian');
        $alumni->waktu = $request->input('waktu');
        $alumni->instansi = $request->input('instansi');
        $alumni->tempat_kerja = $request->input('tempat_kerja');
        $alumni->penghasilan = $request->input('penghasilan');
        $alumni->cara = $request->input('cara');
        $alumni->studi_lanjut = $request->input('studi_lanjut');

        // Update nilai pertanyaan
        foreach ($request->input('pertanyaan', []) as $id => $value) {
            $column = 'p' . ($id - 11); // Menggunakan id - 11 karena p1 dimulai dari pertanyaan_id 12
            if ($column >= 'p1' && $column <= 'p9') {
                $alumni->$column = $value;
            }
        }

        foreach ($request->input('pertanyaanu', []) as $id => $value) { // Tetap menggunakan 'pertanyaanu'
            $column = 'u' . ($id);
            if ($column >= 'u1' && $column <= 'u9') {
                $alumni->$column = $value;
            }
        }


        // Simpan model ke database
        $alumni->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Your response has been recorded!');
    }
}
