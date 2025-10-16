<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Alumni; // Pastikan model Alumni di-import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        // Ambil email dari request
        $email = $request->input('email');

        // Debugging: Log email yang diterima
        Log::info('Email yang diterima untuk reset: ', ['email' => $email]);

        // Pastikan email tidak kosong
        if (empty($email)) {
            return back()->withErrors(['email' => 'Email tidak boleh kosong.']);
        }

        // Cek apakah email terdaftar di database
        $user = Alumni::where('email', $email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak terdaftar.']);
        }

        try {
            // Mengirim email
            Mail::send('emails.reset-password', ['user' => $user], function ($message) use ($email) {
                $message->to($email);
                $message->subject('Reset Password');
            });
        } catch (\Exception $e) {
            Log::error('Gagal mengirim email: ' . $e->getMessage());
            return back()->withErrors(['email' => 'Gagal mengirim email. Silakan coba lagi.']);
        }

        return back()->with('status', 'Email reset password telah dikirim!');
    }





    public function showResetForm()
    {
        return view('auth.reset-password');
    }

    public function reset(Request $request)
    {
        // Ambil email dari request
        $email = $request->input('email');
        $password = $request->input('password');
        $passwordConfirmation = $request->input('password_confirmation');

        // Temukan alumni berdasarkan email
        $alumni = Alumni::where('email', $email)->first();

        // Periksa apakah alumni ditemukan
        if (!$alumni) {
            return back()->withErrors(['email' => 'Email tidak valid.']);
        }

        // Periksa apakah password dan konfirmasi password sama
        if ($password !== $passwordConfirmation) {
            return back()->withErrors(['password' => 'Konfirmasi password tidak cocok.']);
        }

        // Perbarui password
        $alumni->password = Hash::make($password);
        $alumni->save();

        return redirect()->route('login')->with('status', 'Password Anda telah berhasil direset.');
    }
}
