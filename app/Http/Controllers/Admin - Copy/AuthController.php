<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash; // Tambahkan ini

class AuthController extends Controller
{
    public function loginForm()
    {
        if (Session::has('admin')) {
            // Jika sudah login, redirect ke halaman dashboard admin
            return redirect('dashboard');
        } else {
            return view('admin.pages.auth.login');
        }
    }

    public function login(Request $request)
    {
        $nama = $request->input('nama');
        $password = $request->input('password');

        // Cek di tabel admin
        $admin = DB::table('admin')->where('username', $nama)->first();

        if ($admin) {
            Session::put('user_id', $admin->admin_id);
            Session::put('user_role', 'admin');
            Session::put('user_name', $admin->username);
            return redirect('dashboard');
        }

        // Cek di tabel alumni
        $alumni = DB::table('alumni')->where('email', $nama)->first();

        if ($alumni && Hash::check($password, $alumni->password)) {
            Session::put('user_id', $alumni->alumni_id);
            Session::put('user_role', $alumni->role);
            Session::put('user_name', $alumni->nama);
            Session::put('status', $alumni->status);
            return redirect('formalumni');
        }

        // Cek di tabel tendik
        $tendik = DB::table('tendik')->where('email', $nama)->first();

        if ($tendik && Hash::check($password, $tendik->password)) {
            Session::put('user_id', $tendik->tendik_id);
            Session::put('user_role', $tendik->role);
            Session::put('user_name', $tendik->nama);
            Session::put('status', $tendik->status);
            return redirect('formtendik');
        }

        // Cek di tabel dosen
        $dosen = DB::table('dosen')->where('email', $nama)->first();

        if ($dosen && Hash::check($password, $dosen->password)) {
            Session::put('user_id', $dosen->dosen_id);
            Session::put('user_role', $dosen->role);
            Session::put('user_name', $dosen->nama);
            Session::put('status', $dosen->status);
            return redirect('formdosen');
        }

        // Cek di tabel mahasiswa
        $mahasiswa = DB::table('mahasiswa')->where('email', $nama)->first();

        if ($mahasiswa && Hash::check($password, $mahasiswa->password)) {
            Session::put('user_id', $mahasiswa->mahasiswa_id);
            Session::put('user_role', $mahasiswa->role);
            Session::put('user_name', $mahasiswa->nama);
            Session::put('status', $mahasiswa->status);
            return redirect('formmahasiswa');
        }

        // Cek di tabel mitra
        $mitra = DB::table('mitra')->where('email', $nama)->first();

        if ($mitra && Hash::check($password, $mitra->password)) {
            Session::put('user_id', $mitra->mitra_id);
            Session::put('user_role', $mitra->role);
            Session::put('user_name', $mitra->nama);
            return redirect('formmitra');
        }

        // Cek di tabel pengguna lulusan
        $pengguna_lulusan = DB::table('pengguna_lulusan')->where('email', $nama)->first();

        if ($pengguna_lulusan && Hash::check($password, $pengguna_lulusan->password)) {
            Session::put('user_id', $pengguna_lulusan->penggunalulusan_id);
            Session::put('user_role', $pengguna_lulusan->role);
            Session::put('user_name', $pengguna_lulusan->nama_identitaspenilai);
            return redirect('formpenggunalulusan');
        }

        // Cek di tabel masyarakat (login tanpa password)
        $masyarakat = DB::table('masyarakat')->where('email', $nama)->first();

        if ($masyarakat) {
            Session::put('user_id', $masyarakat->masyarakat_id);
            Session::put('user_role', 'masyarakat');
            Session::put('user_name', $masyarakat->nama);
            return redirect('formmasyarakat'); // Ganti dengan rute yang sesuai
        }

        // Jika login gagal
        return back()->with('error', 'Login gagal. Silakan cek kembali nama dan password Anda.');
    }

    public function logout()
    {
        // Membersihkan semua data sesi
        Session::flush();

        // Redirect ke halaman login setelah logout
        return redirect('/');
    }

    // Bagian memilih cluster
    public function selectCluster()
    {
        return view('admin.pages.registration.select_cluster'); // Tampilkan halaman pemilihan kluster
    }

    // Bagian untuk registrasi
    public function submitCluster(Request $request)
    {
        $cluster = $request->input('cluster'); // Mengambil kluster yang dipilih
        Session::put('selected_cluster', $request->input('cluster'));
        switch ($cluster) {
            case 'alumni':
                return redirect('formalumni');
            case 'mahasiswa':
                return redirect()->route('register.mahasiswa');
            case 'tendik':
                return redirect()->route('register.tendik');
            case 'dosen':
                return redirect()->route('register.dosen');
            case 'mitra':
                return redirect('formmitra');
            case 'masyarakat':
                return redirect()->route('register.masyarakat');
            case 'penggunalulusan':
                return redirect()->route('register.penggunalulusan');
                // Tambahkan case untuk kluster lain sesuai kebutuhan
            default:
                return redirect()->back()->withErrors('Kluster tidak valid.');
        }
    }

    public function processClusterSelection(Request $request)
    {
        // Proses logika pemilihan kluster
        $cluster = Session::get('selected_cluster');

        if (!$cluster) {
            return redirect()->route('register.select')->withErrors(['error' => 'Silakan pilih kluster.']);
        }

        return redirect()->route("register.$cluster"); // Arahkan ke route pendaftaran sesuai kluster
    }

    public function forgetpasswordForm()
    {
        return view('admin.pages.auth.forgetpassword'); // Tampilkan halaman pemilihan kluster
    }

    public function resetPassword(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ], [
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        ]);


        $email = $validatedData['email'];
        $newPassword = bcrypt($validatedData['password']); // Encrypt the new password

        // Check in all relevant tables
        $tables = [
            'alumni',
            'dosen',
            'mahasiswa',
            'masyarakat',
            'mitra',
            'pengguna_lulusan',
            'tendik',
        ];

        foreach ($tables as $table) {
            $user = DB::table($table)->where('email', $email)->first();
            if ($user) {
                // Update the password
                DB::table($table)->where('email', $email)->update(['password' => $newPassword]);
                return redirect('/')->with('success', 'Password berhasil diperbarui.');
            }
        }

        // If no user found
        return back()->withErrors(['email' => 'Email tidak terdaftar.']);
    }
}
