<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PertanyaanAlumni;
use App\Models\PertanyaanMasyarakat;
use App\Models\Alumni;

class FormAlumniController extends Controller
{

    public function formalumni(Request $request)
    {
        $pertanyaanAlumni = PertanyaanAlumni::all();
        $pertanyaanMasyarakat = PertanyaanMasyarakat::all();
        $programStudi = config('programstudi');
        $email = session('dataAlumni');

        $responses = [];
        $responsesu = [];
        if ($email) {
            $mappingP = [
                12 => 'p1',
                13 => 'p2',
                14 => 'p3',
                15 => 'p4',
                16 => 'p5',
                17 => 'p6',
                18 => 'p7',
                19 => 'p8',
                20 => 'p9',
            ];

            foreach ($mappingP as $pertanyaan_id => $column) {
                if (isset($email->{$column})) {
                    $responses[$pertanyaan_id] = $email->{$column};
                }
            }

            $mappingU = [
                1 => 'u1',
                2 => 'u2',
                3 => 'u3',
                4 => 'u4',
                5 => 'u5',
                6 => 'u6',
                7 => 'u7',
                8 => 'u8',
                9 => 'u9',
            ];
            foreach ($mappingU as $pertanyaan_id => $column) {
                if (isset($email->{$column})) {
                    $responsesu[$pertanyaan_id] = $email->{$column};
                }
            }
        }


        return view('admin.pages.form.formalumni', compact(
            'programStudi',
            'pertanyaanAlumni',
            'pertanyaanMasyarakat',
            'responsesu',
            'responses',
            'email'
        ));
    }

    public function store(Request $request)
    {
        $email = $request->input('email');

        $alumni = Alumni::where('email', $email)->first();

        if (!$alumni) {
            $alumni = new Alumni();
            $alumni->status = 1;
        }

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
        $alumni->jenistempatkerja = $request->input('jenistempatkerja');
        $alumni->instansi = $request->input('instansi');
        $alumni->tempat_kerja = $request->input('tempat_kerja');
        $alumni->penghasilan = $request->input('penghasilan');
        $alumni->cara = $request->input('cara');
        $alumni->studi_lanjut = $request->input('studi_lanjut');
        $alumni->email = $email;

        foreach ($request->input('pertanyaan', []) as $id => $value) {
            $column = 'p' . ($id - 11);
            if ($column >= 'p1' && $column <= 'p9') {
                $alumni->$column = $value;
            }
        }

        foreach ($request->input('pertanyaanu', []) as $id => $value) {
            $column = 'u' . $id;
            if ($column >= 'u1' && $column <= 'u9') {
                $alumni->$column = $value;
            }
        }

        $alumni->save();

        $message = $alumni->wasRecentlyCreated ? 'Data alumni berhasil ditambahkan!' : 'Data alumni berhasil diperbarui!';
        return redirect()->back()->with('success', $message);
    }
}
