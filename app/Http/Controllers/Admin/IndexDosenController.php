<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;

class IndexDosenController extends Controller
{
    public function indexdosen()
    {

        // Tambahkan logika untuk membuat tabel jurusan, prodi, responden, dan total
        $programStudi = config('programstudi');
        $tableData = [];
        // Ambil data dari config
        $programStudi = config('programstudi');
        $dosenData = Dosen::where('status', 1)->count();

        $dosenUU1 = Dosen::where('status', 1)->sum('u1');
        $dosenU1 = $dosenUU1 / $dosenData;
        $dosenUU2 = Dosen::where('status', 1)->sum('u2');
        $dosenU2 = $dosenUU2 / $dosenData;
        $dosenUU3 = Dosen::where('status', 1)->sum('u3');
        $dosenU3 = $dosenUU3 / $dosenData;
        $dosenUU4 = Dosen::where('status', 1)->sum('u4');
        $dosenU4 = $dosenUU4 / $dosenData;
        $dosenUU5 = Dosen::where('status', 1)->sum('u5');
        $dosenU5 = $dosenUU5 / $dosenData;
        $dosenUU6 = Dosen::where('status', 1)->sum('u6');
        $dosenU6 = $dosenUU6 / $dosenData;
        $dosenUU7 = Dosen::where('status', 1)->sum('u7');
        $dosenU7 = $dosenUU7 / $dosenData;
        $dosenUU8 = Dosen::where('status', 1)->sum('u8');
        $dosenU8 = $dosenUU8 / $dosenData;
        $dosenUU9 = Dosen::where('status', 1)->sum('u9');
        $dosenU9 = $dosenUU9 / $dosenData;

        // Hitung jumlah dosen per program studi
        $jumlahDosenPerProdi = [];
        foreach ($programStudi as $jurusan => $prodiList) {
            foreach ($prodiList as $prodi) {
                $jumlahDosenPerProdi[$prodi] = Dosen::where('prodi', $prodi)->count();
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

        return view('admin.pages.dashboard.IndexDosen', compact(
            'dosenData',
            'jumlahDosenPerProdi',
            'tableData',
            'dosenU1',
            'dosenU2',
            'dosenU3',
            'dosenU4',
            'dosenU5',
            'dosenU6',
            'dosenU7',
            'dosenU8',
            'dosenU9',
        ));
    }

    private function countRespondents($prodi)
    {
        // Hitung jumlah responden dari setiap tabel
        $dosenCount = Dosen::where('prodi', $prodi)->count();


        return $dosenCount;
    }
}
