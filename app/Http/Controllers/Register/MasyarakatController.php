<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function registerForm()
    {
        return view('admin.pages.register.masyarakat'); // Tampilkan formulir pendaftaran untuk alumni
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        // Simpan data masyarakat
        $masyarakat = new masyarakat();
        $masyarakat->nama = $validatedData['nama'];
        $masyarakat->save();

        // Redirecting to the login page with a success message
        return redirect()->route('loginform')->with('register', 'Pendaftaran berhasil.');
    }
}
