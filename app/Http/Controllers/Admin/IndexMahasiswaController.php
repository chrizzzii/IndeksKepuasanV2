<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class IndexMahasiswaController extends Controller
{
    public function indexmahasiswa()
    {

        // Tambahkan logika untuk membuat tabel jurusan, prodi, responden, dan total
        $programStudi = config('programstudi');
        $tableData = [];
        // Ambil data dari config
        $programStudi = config('programstudi');
        $mahasiswaData = Mahasiswa::where('status', 1)->count();

        $mahasiswaUU1 = Mahasiswa::where('status', 1)->sum('u1');
        $mahasiswaU1 = $mahasiswaUU1 / $mahasiswaData;
        $mahasiswaUU2 = Mahasiswa::where('status', 1)->sum('u2');
        $mahasiswaU2 = $mahasiswaUU2 / $mahasiswaData;
        $mahasiswaUU3 = Mahasiswa::where('status', 1)->sum('u3');
        $mahasiswaU3 = $mahasiswaUU3 / $mahasiswaData;
        $mahasiswaUU4 = Mahasiswa::where('status', 1)->sum('u4');
        $mahasiswaU4 = $mahasiswaUU4 / $mahasiswaData;
        $mahasiswaUU5 = Mahasiswa::where('status', 1)->sum('u5');
        $mahasiswaU5 = $mahasiswaUU5 / $mahasiswaData;
        $mahasiswaUU6 = Mahasiswa::where('status', 1)->sum('u6');
        $mahasiswaU6 = $mahasiswaUU6 / $mahasiswaData;
        $mahasiswaUU7 = Mahasiswa::where('status', 1)->sum('u7');
        $mahasiswaU7 = $mahasiswaUU7 / $mahasiswaData;
        $mahasiswaUU8 = Mahasiswa::where('status', 1)->sum('u8');
        $mahasiswaU8 = $mahasiswaUU8 / $mahasiswaData;
        $mahasiswaUU9 = Mahasiswa::where('status', 1)->sum('u9');
        $mahasiswaU9 = $mahasiswaUU9 / $mahasiswaData;

        $jumlahMahasiswaPerProdi = [];
        foreach ($programStudi as $jurusan => $prodiList) {
            foreach ($prodiList as $prodi) {
                $jumlahMahasiswaPerProdi[$prodi] = Mahasiswa::where('prodi', $prodi)->count();
            }
        }

        // Hitung jumlah responden untuk setiap prodi
        foreach ($programStudi as $jurusan => $prodis) {
            foreach ($prodis as $prodi) {
                $respondenCount = $this->countRespondents($prodi);
                $tableData[] = [
                    'jurusan' => $jurusan,
                    'prodi' => $prodi,
                    'responden' => $respondenCount,
                ];
            }
        }

        // Hitung total responden untuk setiap jurusan
        $totalCounts = [];
        foreach ($tableData as $data) {
            $jurusan = $data['jurusan'];
            if (!isset($totalCounts[$jurusan])) {
                $totalCounts[$jurusan] = 0;
            }
            $totalCounts[$jurusan] += $data['responden'];
        }

        return view('admin.pages.dashboard.IndexMahasiswa', compact(
            'mahasiswaData',
            'jumlahMahasiswaPerProdi',
            'tableData',
            'mahasiswaU1',
            'mahasiswaU2',
            'mahasiswaU3',
            'mahasiswaU4',
            'mahasiswaU5',
            'mahasiswaU6',
            'mahasiswaU7',
            'mahasiswaU8',
            'mahasiswaU9',
        ));
    }

    private function countRespondents($prodi)
    {
        // Hitung jumlah responden dari setiap tabel
        $mahasiswaCount = Mahasiswa::where('prodi', $prodi)->count();


        return $mahasiswaCount;
    }
}
