<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tendik;

class IndexTendikController extends Controller
{
    public function indextendik()
    {

        // Tambahkan logika untuk membuat tabel jurusan, prodi, responden, dan total
        $programStudi = config('programstudi');
        $tableData = [];
        $programStudi = config('programstudi');
        $tendikData = Tendik::where('status', 1)->count();

        $tendikUU1 = Tendik::where('status', 1)->sum('u1');
        $tendikU1 = $tendikUU1 / $tendikData;
        $tendikUU2 = Tendik::where('status', 1)->sum('u2');
        $tendikU2 = $tendikUU2 / $tendikData;
        $tendikUU3 = Tendik::where('status', 1)->sum('u3');
        $tendikU3 = $tendikUU3 / $tendikData;
        $tendikUU4 = Tendik::where('status', 1)->sum('u4');
        $tendikU4 = $tendikUU4 / $tendikData;
        $tendikUU5 = Tendik::where('status', 1)->sum('u5');
        $tendikU5 = $tendikUU5 / $tendikData;
        $tendikUU6 = Tendik::where('status', 1)->sum('u6');
        $tendikU6 = $tendikUU6 / $tendikData;
        $tendikUU7 = Tendik::where('status', 1)->sum('u7');
        $tendikU7 = $tendikUU7 / $tendikData;
        $tendikUU8 = Tendik::where('status', 1)->sum('u8');
        $tendikU8 = $tendikUU8 / $tendikData;
        $tendikUU9 = Tendik::where('status', 1)->sum('u9');
        $tendikU9 = $tendikUU9 / $tendikData;

        $jumlahTendikPerProdi = [];
        foreach ($programStudi as $jurusan => $prodiList) {
            foreach ($prodiList as $prodi) {
                $jumlahTendikPerProdi[$prodi] = Tendik::where('prodi', $prodi)->count();
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



        return view('admin.pages.dashboard.indextendik', compact(
            'tendikData',
            'jumlahTendikPerProdi',
            'tableData',
            'tendikU1',
            'tendikU2',
            'tendikU3',
            'tendikU4',
            'tendikU5',
            'tendikU6',
            'tendikU7',
            'tendikU8',
            'tendikU9',
        ));
    }


    private function countRespondents($prodi)
    {
        // Hitung jumlah responden dari setiap tabel
        $tendikCount = Tendik::where('prodi', $prodi)->count();


        return $tendikCount;
    }
}
