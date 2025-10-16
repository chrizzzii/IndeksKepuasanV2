<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\Dosen; // Pastikan model Dosen ada
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function registerForm()
    {
        return view('admin.pages.register.dosen'); // Tampilkan formulir pendaftaran untuk Dosen
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:dosen,email', // Cek jika email sudah ada
            'password' => 'required|string|min:6',
        ]);

        // Simpan data dosen
        $dosen = new Dosen();
        $dosen->email = $validatedData['email'];
        $dosen->password = bcrypt($validatedData['password']); // Enkripsi password
        $dosen->role = 'dosen';
        $dosen->save();

        // Redirecting to the login page with a success message
        return redirect()->route('loginform')->with('register', 'Pendaftaran berhasil.');
    }
}
