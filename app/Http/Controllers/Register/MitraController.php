<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function registerForm()
    {
        return view('admin.pages.register.mitra'); // Tampilkan formulir pendaftaran untuk Mitra
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:mitra,email', // Cek jika email sudah ada,
            'password' => 'required|string|min:6',
        ]);

        // Simpan data mitra
        $mitra = new mitra();
        $mitra->email = $validatedData['email'];
        $mitra->password = bcrypt($validatedData['password']); // Enkripsi password
        $mitra->role = 'mitra';
        $mitra->save();

        // Redirecting to the login page with a success message
        return redirect()->route('loginform')->with('register', 'Pendaftaran berhasil.');
    }
}
