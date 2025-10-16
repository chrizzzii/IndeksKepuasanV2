<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\Alumni; // Pastikan model Alumni ada
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function registerForm()
    {
        // Tampilkan formulir pendaftaran untuk alumni
        return view('admin.pages.register.alumni');
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:alumni,email', // Cek jika email sudah ada
            'password' => 'required|string|min:6',
        ]);

        // Simpan data alumni
        $alumni = new Alumni();
        $alumni->email = $validatedData['email'];
        $alumni->password = bcrypt($validatedData['password']); // Enkripsi password
        $alumni->role = 'alumni';
        $alumni->save();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('loginform')->with('register', 'Pendaftaran berhasil.');
    }
}
