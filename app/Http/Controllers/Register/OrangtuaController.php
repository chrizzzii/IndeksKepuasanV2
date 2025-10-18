<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\OrangTua;
use Illuminate\Http\Request;

class OrangtuaController extends Controller
{
    public function registerForm()
    {
        return view('admin.pages.register.orangtua'); // Tampilkan formulir pendaftaran untuk Orangtua
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:orangtua,email', // Cek jika email sudah ada,
            'password' => 'required|string|min:6',
        ]);

        // Simpan data orangtua
        $orangtua = new orangtua();
        $orangtua->email = $validatedData['email'];
        $orangtua->password = bcrypt($validatedData['password']); // Enkripsi password
        $orangtua->role = 'orangtua';
        $orangtua->save();

        // Redirecting to the login page with a success message
        return redirect()->route('loginform')->with('register', 'Pendaftaran berhasil.');
    }
}
