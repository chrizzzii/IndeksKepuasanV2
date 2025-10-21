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

        $responses = [];
        $responsesu = [];

        // Ambil email dari session (redirect after submitCluster)
        $email = session('dataMitra'); // ganti sesuai session kamu

        if ($email) {
            // p1-p10
            for ($i = 1; $i <= 10; $i++) {
                $responses[$i] = $email->{'p' . $i};
            }

            // u1-u9
            for ($i = 1; $i <= 9; $i++) {
                $responsesu[$i] = $email->{'u' . $i};
            }
        }

        return view('admin.pages.form.formmitra', compact(
            'pertanyaanMitra',
            'pertanyaanMasyarakat',
            'responses',
            'responsesu'
        ));
    }



    public function store(Request $request)
    {
        $email = $request->input('email');

        // Cek apakah Mitra sudah ada berdasarkan email
        $mitra = Mitra::where('email', $email)->first();

        if (!$mitra) {
            $mitra = new Mitra();
            $mitra->status = 1;

            // Set no_responden baru jika create
            $maxNoResponden = Mitra::max('no_responden');
            $mitra->no_responden = $maxNoResponden ? $maxNoResponden + 1 : 1;
        }

        // Set data umum
        $mitra->nama = $request->input('nama');
        $mitra->jabatan = $request->input('jabatan');
        $mitra->nama_instansi = $request->input('nama_instansi');
        $mitra->alamat = $request->input('alamat');
        $mitra->email = $email;
        $mitra->nomor_telepon = $request->input('nomor_telepon');

        // Ambil array dari checkbox (bisa kosong kalau belum diisi)
        $bidangKerjasama = $request->input('bidang_kerjasama', []);

        // Jika user memilih "Lainnya" dan menulis teks tambahan
        if (in_array('other', $bidangKerjasama)) {
            $other = trim($request->input('otherbidangkerjasama'));
            if (!empty($other)) {
                // Ganti 'other' dengan teks yang ditulis user
                $index = array_search('other', $bidangKerjasama);
                $bidangKerjasama[$index] = $other;
            } else {
                // Jika "other" dicentang tapi tidak diisi, hapus saja nilainya
                $bidangKerjasama = array_diff($bidangKerjasama, ['other']);
            }
        }

        // Simpan semua ke satu kolom (TEXT / JSON)
        $mitra->bidang_kerjasama = json_encode(array_values($bidangKerjasama));

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
        $mitra->tanggal = $request->input('tanggal');
        $mitra->saranmasukkan = $request->input('saranmasukkan');

        // Simpan
        $mitra->save();

        $message = $mitra->wasRecentlyCreated ? 'Data Mitra berhasil ditambahkan!' : 'Data Mitra berhasil diperbarui!';

        return redirect()->back()->with('success', $message);
    }
}
