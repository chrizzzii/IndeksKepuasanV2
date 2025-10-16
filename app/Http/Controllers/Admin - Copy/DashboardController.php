<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Mitra;
use App\Models\Alumni;
use App\Models\Tendik;
use App\Models\Mahasiswa;
use App\Models\Penggunalulusan;
use App\Models\Dosen;

class DashboardController extends Controller
{
    public function showPilihprodi()
    {
        // Ambil daftar program studi dari konfigurasi
        $programstudi = config('programstudi');

        // Kirim ke view
        return view('admin.pages.dashboard.pilihprodi', compact('programstudi'));
    }

    public function index(Request $request)
    {
        // Ambil pilihan 'prodi' dari input form
        $selectedProdi = $request->input('prodi');

        $alumniDatafilter = Alumni::where('status', 1)->where('prodi', $selectedProdi)->count();
        $tendikDatafilter = Tendik::where('status', 1)->where('prodi', $selectedProdi)->count();
        $mahasiswaDatafilter = Mahasiswa::where('status', 1)->where('prodi', $selectedProdi)->count();
        $dosenDatafilter = Dosen::where('status', 1)
            ->where(function ($query) use ($selectedProdi) {
                $query->where('prodi', $selectedProdi)
                    ->orWhere('prodi2', $selectedProdi)
                    ->orWhere('prodi3', $selectedProdi)
                    ->orWhere('prodi4', $selectedProdi)
                    ->orWhere('prodi5', $selectedProdi);
            })
            ->count();


        // Hitung jumlah dengan status 1 untuk setiap model
        $mitraData = Mitra::where('status', 1)->count();
        $alumniData = Alumni::where('status', 1)->count();
        $tendikData = Tendik::where('status', 1)->count();
        $mahasiswaData = Mahasiswa::where('status', 1)->count();
        $penggunalulusanData = Penggunalulusan::where('status', 1)->count();

        // Hitung jumlah dosen yang mengisi program studi tertentu
        $dosenData = Dosen::where('status', 1)->get();
        $totalDosen = 0;
        foreach ($dosenData as $dosen) {
            $prodis = [
                $dosen->prodi,
                $dosen->prodi2,
                $dosen->prodi3,
                $dosen->prodi4,
                $dosen->prodi5
            ];
            // Hapus prodi yang kosong (null atau empty)
            $prodis = array_filter($prodis, function ($prodi) {
                return !empty($prodi); // hanya prodi yang diisi yang dihitung
            });

            // Tambahkan jumlah dosen untuk setiap prodi yang diisi
            $totalDosen += count($prodis);
        }

        // Hitung total u1 hingga u9 dari setiap tabel yang status-nya 1
        // $mitraU1 = Mitra::where('status', 1)->sum('u1');
        // $alumniU1 = Alumni::where('status', 1)->sum('u1');
        // $tendikU1 = Tendik::where('status', 1)->sum('u1');
        // $mahasiswaU1 = Mahasiswa::where('status', 1)->sum('u1');
        // $penggunalulusanU1 = Penggunalulusan::where('status', 1)->sum('u1');
        // $dosenU1 = Dosen::where('status', 1)->sum('u1');
        // $u1total = ($mitraU1 + $alumniU1 + $tendikU1 + $mahasiswaU1 + $penggunalulusanU1 + $dosenU1)/6;

        // Hitung total u1 hingga u9 dari setiap tabel yang status-nya 1
        $mitraU1 = Mitra::where('status', 1)->sum('u1') / $mitraData;
        $alumniU1 = Alumni::where('status', 1)->sum('u1') / $alumniData;
        $tendikU1 = Tendik::where('status', 1)->sum('u1') / $tendikData;
        $mahasiswaU1 = Mahasiswa::where('status', 1)->sum('u1') / $mahasiswaData;
        $penggunalulusanU1 = Penggunalulusan::where('status', 1)->sum('u1') / $penggunalulusanData;
        $dosenU1 = Dosen::where('status', 1)->sum('u1') / $totalDosen;
        $u1total = ($mitraU1 + $alumniU1 + $tendikU1 + $mahasiswaU1 + $penggunalulusanU1 + $dosenU1) / 6;

        $mitraU2 = Mitra::where('status', 1)->sum('u2') / $mitraData;
        $alumniU2 = Alumni::where('status', 1)->sum('u2') / $alumniData;
        $tendikU2 = Tendik::where('status', 1)->sum('u2') / $tendikData;
        $mahasiswaU2 = Mahasiswa::where('status', 1)->sum('u2') / $mahasiswaData;
        $penggunalulusanU2 = Penggunalulusan::where('status', 1)->sum('u2') / $penggunalulusanData;
        $dosenU2 = Dosen::where('status', 1)->sum('u2') / $totalDosen;
        $u2total = ($mitraU2 + $alumniU2 + $tendikU2 + $mahasiswaU2 + $penggunalulusanU2 + $dosenU2) / 6;

        $mitraU3 = Mitra::where('status', 1)->sum('u3') / $mitraData;
        $alumniU3 = Alumni::where('status', 1)->sum('u3') / $alumniData;
        $tendikU3 = Tendik::where('status', 1)->sum('u3') / $tendikData;
        $mahasiswaU3 = Mahasiswa::where('status', 1)->sum('u3') / $mahasiswaData;
        $penggunalulusanU3 = Penggunalulusan::where('status', 1)->sum('u3') / $penggunalulusanData;
        $dosenU3 = Dosen::where('status', 1)->sum('u3') / $totalDosen;
        $u3total = ($mitraU3 + $alumniU3 + $tendikU3 + $mahasiswaU3 + $penggunalulusanU3 + $dosenU3) / 6;

        $mitraU4 = Mitra::where('status', 1)->sum('u4') / $mitraData;
        $alumniU4 = Alumni::where('status', 1)->sum('u4') / $alumniData;
        $tendikU4 = Tendik::where('status', 1)->sum('u4') / $tendikData;
        $mahasiswaU4 = Mahasiswa::where('status', 1)->sum('u4') / $mahasiswaData;
        $penggunalulusanU4 = Penggunalulusan::where('status', 1)->sum('u4') / $penggunalulusanData;
        $dosenU4 = Dosen::where('status', 1)->sum('u4') / $totalDosen;
        $u4total = ($mitraU4 + $alumniU4 + $tendikU4 + $mahasiswaU4 + $penggunalulusanU4 + $dosenU4) / 6;

        $mitraU5 = Mitra::where('status', 1)->sum('u5') / $mitraData;
        $alumniU5 = Alumni::where('status', 1)->sum('u5') / $alumniData;
        $tendikU5 = Tendik::where('status', 1)->sum('u5') / $tendikData;
        $mahasiswaU5 = Mahasiswa::where('status', 1)->sum('u5') / $mahasiswaData;
        $penggunalulusanU5 = Penggunalulusan::where('status', 1)->sum('u5') / $penggunalulusanData;
        $dosenU5 = Dosen::where('status', 1)->sum('u5') / $totalDosen;
        $u5total = ($mitraU5 + $alumniU5 + $tendikU5 + $mahasiswaU5 + $penggunalulusanU5 + $dosenU5) / 6;

        $mitraU6 = Mitra::where('status', 1)->sum('u6') / $mitraData;
        $alumniU6 = Alumni::where('status', 1)->sum('u6') / $alumniData;
        $tendikU6 = Tendik::where('status', 1)->sum('u6') / $tendikData;
        $mahasiswaU6 = Mahasiswa::where('status', 1)->sum('u6') / $mahasiswaData;
        $penggunalulusanU6 = Penggunalulusan::where('status', 1)->sum('u6') / $penggunalulusanData;
        $dosenU6 = Dosen::where('status', 1)->sum('u6') / $totalDosen;
        $u6total = ($mitraU6 + $alumniU6 + $tendikU6 + $mahasiswaU6 + $penggunalulusanU6 + $dosenU6) / 6;

        $mitraU7 = Mitra::where('status', 1)->sum('u7') / $mitraData;
        $alumniU7 = Alumni::where('status', 1)->sum('u7') / $alumniData;
        $tendikU7 = Tendik::where('status', 1)->sum('u7') / $tendikData;
        $mahasiswaU7 = Mahasiswa::where('status', 1)->sum('u7') / $mahasiswaData;
        $penggunalulusanU7 = Penggunalulusan::where('status', 1)->sum('u7') / $penggunalulusanData;
        $dosenU7 = Dosen::where('status', 1)->sum('u7') / $totalDosen;
        $u7total = ($mitraU7 + $alumniU7 + $tendikU7 + $mahasiswaU7 + $penggunalulusanU7 + $dosenU7) / 6;

        $mitraU8 = Mitra::where('status', 1)->sum('u8') / $mitraData;
        $alumniU8 = Alumni::where('status', 1)->sum('u8') / $alumniData;
        $tendikU8 = Tendik::where('status', 1)->sum('u8') / $tendikData;
        $mahasiswaU8 = Mahasiswa::where('status', 1)->sum('u8') / $mahasiswaData;
        $penggunalulusanU8 = Penggunalulusan::where('status', 1)->sum('u8') / $penggunalulusanData;
        $dosenU8 = Dosen::where('status', 1)->sum('u8') / $totalDosen;
        $u8total = ($mitraU8 + $alumniU8 + $tendikU8 + $mahasiswaU8 + $penggunalulusanU8 + $dosenU8) / 6;

        $mitraU9 = Mitra::where('status', 1)->sum('u9') / $mitraData;
        $alumniU9 = Alumni::where('status', 1)->sum('u9') / $alumniData;
        $tendikU9 = Tendik::where('status', 1)->sum('u9') / $tendikData;
        $mahasiswaU9 = Mahasiswa::where('status', 1)->sum('u9') / $mahasiswaData;
        $penggunalulusanU9 = Penggunalulusan::where('status', 1)->sum('u9') / $penggunalulusanData;
        $dosenU9 = Dosen::where('status', 1)->sum('u9') / $totalDosen;
        $u9total = ($mitraU9 + $alumniU9 + $tendikU9 + $mahasiswaU9 + $penggunalulusanU9 + $dosenU9) / 6;


        //indeks role
        // Calculate the average for each group
        $mitraavg = ($mitraU1 + $mitraU2 + $mitraU3 + $mitraU4 + $mitraU5 + $mitraU6 + $mitraU7 + $mitraU8 + $mitraU9) / 9;

        // Alumni average calculation
        $alumniavg = ($alumniU1 + $alumniU2 + $alumniU3 + $alumniU4 + $alumniU5 + $alumniU6 + $alumniU7 + $alumniU8 + $alumniU9) / 9;

        // Tendik (Education Staff) average calculation
        $tendikavg = ($tendikU1 + $tendikU2 + $tendikU3 + $tendikU4 + $tendikU5 + $tendikU6 + $tendikU7 + $tendikU8 + $tendikU9) / 9;

        // Mahasiswa (Student) average calculation
        $mahasiswaavg = ($mahasiswaU1 + $mahasiswaU2 + $mahasiswaU3 + $mahasiswaU4 + $mahasiswaU5 + $mahasiswaU6 + $mahasiswaU7 + $mahasiswaU8 + $mahasiswaU9) / 9;

        // Pengguna Lulusan (Graduate Users) average calculation
        $penggunalulusanavg = ($penggunalulusanU1 + $penggunalulusanU2 + $penggunalulusanU3 + $penggunalulusanU4 + $penggunalulusanU5 + $penggunalulusanU6 + $penggunalulusanU7 + $penggunalulusanU8 + $penggunalulusanU9) / 9;

        // Dosen (Lecturer) average calculation
        $dosenavg = ($dosenU1 + $dosenU2 + $dosenU3 + $dosenU4 + $dosenU5 + $dosenU6 + $dosenU7 + $dosenU8 + $dosenU9) / 9;

        // Cek apakah admin sudah login
        $userRole = Session::get('user_role');
        if (!in_array($userRole, ['admin', 'dosen', 'tendik', 'mitra', 'alumni', 'mahasiswa'])) {
            return redirect('login'); // Redirect ke halaman login jika belum login
        }

        // Kembalikan data ke view
        return view('admin.pages.dashboard.index', compact(
            'selectedProdi',
            'mitraData',
            'alumniData',
            'tendikData',
            'mahasiswaData',
            'penggunalulusanData',
            'totalDosen',
            'alumniDatafilter',
            'tendikDatafilter',
            'mahasiswaDatafilter',
            'dosenDatafilter',
            'u1total',
            'u2total',
            'u3total',
            'u4total',
            'u5total',
            'u6total',
            'u7total',
            'u8total',
            'u9total',
            'mitraavg',
            'alumniavg',
            'tendikavg',
            'mahasiswaavg',
            'penggunalulusanavg',
            'dosenavg',
        ));
    }
}
