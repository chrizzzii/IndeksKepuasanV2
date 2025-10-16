<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function registerForm()
    {
        return view('admin.pages.register.mahasiswa'); // Tampilkan formulir pendaftaran untuk Mahasiswa
    }

    public function store(Request $request)
    {

        // Validasi data
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:mahasiswa,email', // Cek jika email sudah ada
            'password' => 'required|string|min:6',
        ]);

        // Simpan data mahasiswa
        $mahasiswa = new Mahasiswa();
        $mahasiswa->email = $validatedData['email'];
        $mahasiswa->password = bcrypt($validatedData['password']); // Enkripsi password
        $mahasiswa->role = 'mahasiswa';
        $mahasiswa->save();

        // Redirecting to the login page with a success message
        return redirect()->route('loginform')->with('register', 'Pendaftaran berhasil.');
    }
}
