<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PertanyaanOrangTua;
use App\Models\PertanyaanMasyarakat;
use App\Models\Orangtua;

class FormOrangtuaController extends Controller
{
    public function formorangtua()
    {
        $pertanyaanOrangtua = PertanyaanOrangTua::all();
        $pertanyaanMasyarakat = PertanyaanMasyarakat::all();

        $programStudi = config('programstudi');

        $responses = [];
        $responsesu = [];

        $email = session('dataOrangtua');

        if ($email) {
            for ($i = 2; $i <= 28; $i++) {
                $responses[$i] = $email->{'p' . $i};
            }

            for ($i = 1; $i <= 9; $i++) {
                $responsesu[$i] = $email->{'u' . $i};
            }
        }

        return view('admin.pages.form.formorangtua', compact(
            'programStudi',
            'pertanyaanOrangtua',
            'pertanyaanMasyarakat',
            'responses',
            'responsesu'
        ));
    }

    public function store(Request $request)
    {
        $email = $request->input('email');

        $orangtua = Orangtua::where('email', $email)->first();

        if (!$orangtua) {
            $orangtua = new Orangtua();
            $orangtua->status = 1;

            // Set no_responden baru jika create
            $maxNoResponden = Orangtua::max('no_responden');
            $orangtua->no_responden = $maxNoResponden ? $maxNoResponden + 1 : 1;
        }

        $orangtua->nama = $request->input('nama');
        $orangtua->usia = $request->input('usia');
        $orangtua->email = $request->input('email');
        $orangtua->jeniskelamin = $request->input('jeniskelamin');
        $orangtua->pekerjaan = $request->input('pekerjaan');
        $orangtua->alamat = $request->input('alamat');
        $orangtua->nomor_telepon = $request->input('nomor_telepon');
        $orangtua->namamahasiswa = $request->input('namamahasiswa');
        $orangtua->prodi = $request->input('prodi');
        $orangtua->saranmasukkan = $request->input('saranmasukkan');

        foreach ($request->input('pertanyaan', []) as $id => $value) {
            $column = 'p' . ($id - 1); // ID 2 menjadi p1, ID 3 menjadi p2, dst.
            $columnNumber = intval(substr($column, 1)); // Mengambil angka setelah 'p' secara numerik
            if ($columnNumber >= 1 && $columnNumber <= 30) {
                $orangtua->$column = $value;
            }
        }

        foreach ($request->input('pertanyaanu', []) as $id => $value) { // Tetap menggunakan 'pertanyaanu'
            $column = 'u' . ($id);
            if ($column >= 'u1' && $column <= 'u9') {
                $orangtua->$column = $value;
            }
        }


        // Simpan model ke database
        $orangtua->save();

        $message = $orangtua->wasRecentlyCreated ? 'Data Orang Tua berhasil ditambahkan!' : 'Data Orang Tua berhasil diperbarui!';

        return redirect()->back()->with('success', $message);
    }
}
