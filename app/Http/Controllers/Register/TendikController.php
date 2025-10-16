<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\Tendik;
use Illuminate\Http\Request;

class TendikController extends Controller
{
    public function registerForm()
    {
        return view('admin.pages.register.tendik'); // Tampilkan formulir pendaftaran untuk Tendik
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:tendik,email', // Cek jika email sudah ada,
            'password' => 'required|string|min:6',
        ]);

        // Simpan data tendik
        $tendik = new tendik();
        $tendik->email = $validatedData['email'];
        $tendik->password = bcrypt($validatedData['password']); // Enkripsi password
        $tendik->role = 'tendik';
        $tendik->save();

        // Redirecting to the login page with a success message
        return redirect()->route('loginform')->with('register', 'Pendaftaran berhasil.');
    }
}
