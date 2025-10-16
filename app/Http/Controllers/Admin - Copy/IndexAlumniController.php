<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;

class IndexAlumniController extends Controller
{
    public function indexalumni()
    {

        // Tambahkan logika untuk membuat tabel jurusan, prodi, responden, dan total
        $programStudi = config('programstudi');
        $tableData = [];

        // Ambil data dari config
        $programStudi = config('programstudi');
        $alumniData = Alumni::where('status', 1)->count();

        $alumniUU1 = Alumni::where('status', 1)->sum('u1');
        $alumniU1 = $alumniUU1 / $alumniData;
        $alumniUU2 = Alumni::where('status', 1)->sum('u2');
        $alumniU2 = $alumniUU2 / $alumniData;
        $alumniUU3 = Alumni::where('status', 1)->sum('u3');
        $alumniU3 = $alumniUU3 / $alumniData;
        $alumniUU4 = Alumni::where('status', 1)->sum('u4');
        $alumniU4 = $alumniUU4 / $alumniData;
        $alumniUU5 = Alumni::where('status', 1)->sum('u5');
        $alumniU5 = $alumniUU5 / $alumniData;
        $alumniUU6 = Alumni::where('status', 1)->sum('u6');
        $alumniU6 = $alumniUU6 / $alumniData;
        $alumniUU7 = Alumni::where('status', 1)->sum('u7');
        $alumniU7 = $alumniUU7 / $alumniData;
        $alumniUU8 = Alumni::where('status', 1)->sum('u8');
        $alumniU8 = $alumniUU8 / $alumniData;
        $alumniUU9 = Alumni::where('status', 1)->sum('u9');
        $alumniU9 = $alumniUU9 / $alumniData;

        $jumlahLakiLaki = Alumni::where('jeniskelamin', 'Laki-laki')->count();
        $jumlahPerempuan = Alumni::where('jeniskelamin', 'Perempuan')->count();

        // Hitung jumlah alumni per program studi
        $jumlahAlumniPerProdi = [];
        foreach ($programStudi as $jurusan => $prodiList) {
            foreach ($prodiList as $prodi) {
                $jumlahAlumniPerProdi[$prodi] = Alumni::where('prodi', $prodi)->count();
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

        // Tambahkan kolom total ke tableData
        foreach ($tableData as &$data) {
            $data['total'] = $totalCounts[$data['jurusan']];
        }


        return view('admin.pages.dashboard.indexalumni', compact(
            'alumniData',
            'jumlahAlumniPerProdi',
            'jumlahLakiLaki',
            'jumlahPerempuan',
            'tableData',
            'alumniU1',
            'alumniU2',
            'alumniU3',
            'alumniU4',
            'alumniU5',
            'alumniU6',
            'alumniU7',
            'alumniU8',
            'alumniU9',
        ));
    }


    private function countRespondents($prodi)
    {
        // Hitung jumlah responden dari setiap tabel
        $alumniCount = Alumni::where('prodi', $prodi)->count();

        return $alumniCount;
    }
}
