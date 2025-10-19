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
        $programStudi = config('programstudi');

        $responses = [];
        $responsesu = [];

        $email = session('dataTendik');

        if ($email) {
            for ($i = 2; $i <= 27; $i++) {
                $responses[$i] = $email->{'p' . $i};
            }

            for ($i = 1; $i <= 9; $i++) {
                $responsesu[$i] = $email->{'u' . $i};
            }
        }

        return view('admin.pages.form.formtendik', compact(
            'programStudi',
            'pertanyaanTendik',
            'pertanyaanMasyarakat',
            'responses',
            'responsesu'
        ));
    }

    public function store(Request $request)
    {
        $email = $request->input('email');

        $tendik = Tendik::where('email', $email)->first();

        if (!$tendik) {
            $tendik = new Tendik();
            $tendik->status = 1;
        }

        $tendik->nama = $request->input('nama');
        $tendik->nip = $request->input('nip');
        $tendik->usia = $request->input('usia');
        $tendik->jeniskelamin = $request->input('jeniskelamin');
        $tendik->alamat = $request->input('alamat');
        $tendik->nomor_telepon = $request->input('nomor_telepon');
        $tendik->saranmasukkan = $request->input('saranmasukkan');
        $tendik->prodi = $request->input('prodi');
        $tendik->email = $email;

        foreach ($request->input('pertanyaan', []) as $id => $value) {
            $column = 'p' . $id;
            $columnNumber = intval(substr($column, 1));
            if ($columnNumber >= 1 && $columnNumber <= 30) {
                $tendik->$column = $value;
            }
        }

        foreach ($request->input('pertanyaanu', []) as $id => $value) {
            $column = 'u' . ($id);
            if ($column >= 'u1' && $column <= 'u9') {
                $tendik->$column = $value;
            }
        }

        $tendik->save();

        $message = $tendik->wasRecentlyCreated ? 'Data tendik berhasil ditambahkan!' : 'Data tendik berhasil diperbarui!';
        return redirect()->back()->with('success', $message);
    }
}
