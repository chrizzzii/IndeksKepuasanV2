<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrangTua;

class IndexOrangtuaController extends Controller
{
    public function indexorangtua()
    {

        // Tambahkan logika untuk membuat tabel jurusan, prodi, responden, dan total
        $programStudi = config('programstudi');
        $tableData = [];
        $programStudi = config('programstudi');
        $orangtuaData = OrangTua::where('status', 1)->count();

        $orangtuaUU1 = OrangTua::where('status', 1)->sum('u1');
        $orangtuaU1 = $orangtuaUU1 / $orangtuaData;
        $orangtuaUU2 = OrangTua::where('status', 1)->sum('u2');
        $orangtuaU2 = $orangtuaUU2 / $orangtuaData;
        $orangtuaUU3 = OrangTua::where('status', 1)->sum('u3');
        $orangtuaU3 = $orangtuaUU3 / $orangtuaData;
        $orangtuaUU4 = OrangTua::where('status', 1)->sum('u4');
        $orangtuaU4 = $orangtuaUU4 / $orangtuaData;
        $orangtuaUU5 = OrangTua::where('status', 1)->sum('u5');
        $orangtuaU5 = $orangtuaUU5 / $orangtuaData;
        $orangtuaUU6 = OrangTua::where('status', 1)->sum('u6');
        $orangtuaU6 = $orangtuaUU6 / $orangtuaData;
        $orangtuaUU7 = OrangTua::where('status', 1)->sum('u7');
        $orangtuaU7 = $orangtuaUU7 / $orangtuaData;
        $orangtuaUU8 = OrangTua::where('status', 1)->sum('u8');
        $orangtuaU8 = $orangtuaUU8 / $orangtuaData;
        $orangtuaUU9 = OrangTua::where('status', 1)->sum('u9');
        $orangtuaU9 = $orangtuaUU9 / $orangtuaData;

        $jumlahOrangtuaPerProdi = [];
        foreach ($programStudi as $jurusan => $prodiList) {
            foreach ($prodiList as $prodi) {
                $jumlahOrangtuaPerProdi[$prodi] = OrangTua::where('prodi', $prodi)->count();
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



        return view('admin.pages.dashboard.indexorangtua', compact(
            'orangtuaData',
            'jumlahOrangtuaPerProdi',
            'tableData',
            'orangtuaU1',
            'orangtuaU2',
            'orangtuaU3',
            'orangtuaU4',
            'orangtuaU5',
            'orangtuaU6',
            'orangtuaU7',
            'orangtuaU8',
            'orangtuaU9',
        ));
    }


    private function countRespondents($prodi)
    {
        // Hitung jumlah responden dari setiap tabel
        $orangtuaCount = OrangTua::where('prodi', $prodi)->count();


        return $orangtuaCount;
    }
}
