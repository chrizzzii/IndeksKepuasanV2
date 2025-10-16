<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\Penggunalulusan;
use Illuminate\Http\Request;

class PenggunaLulusanController extends Controller
{
    public function registerForm()
    {
        return view('admin.pages.register.penggunaLulusan'); // Tampilkan formulir pendaftaran untuk PenggunaLulusan
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:pengguna_lulusan,email', // Cek jika email sudah ada,
            'password' => 'required|string|min:6',
        ]);

        // Simpan data penggunalulusan
        $penggunalulusan = new penggunalulusan();
        $penggunalulusan->email = $validatedData['email'];
        $penggunalulusan->password = bcrypt($validatedData['password']); // Enkripsi password
        $penggunalulusan->role = 'pengguna lulusan';
        $penggunalulusan->save();

        // Redirecting to the login page with a success message
        return redirect()->route('loginform')->with('register', 'Pendaftaran berhasil.');
    }
}
