<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penggunalulusan;

class IndexPenggunaController extends Controller
{
    public function indexpengguna()
    {
        $penggunalulusanData = Penggunalulusan::where('status', 1)->count();

        $penggunalulusanUU1 = Penggunalulusan::where('status', 1)->sum('u1');
        $penggunalulusanU1 = $penggunalulusanUU1 / $penggunalulusanData;
        $penggunalulusanUU2 = Penggunalulusan::where('status', 1)->sum('u2');
        $penggunalulusanU2 = $penggunalulusanUU2 / $penggunalulusanData;
        $penggunalulusanUU3 = Penggunalulusan::where('status', 1)->sum('u3');
        $penggunalulusanU3 = $penggunalulusanUU3 / $penggunalulusanData;
        $penggunalulusanUU4 = Penggunalulusan::where('status', 1)->sum('u4');
        $penggunalulusanU4 = $penggunalulusanUU4 / $penggunalulusanData;
        $penggunalulusanUU5 = Penggunalulusan::where('status', 1)->sum('u5');
        $penggunalulusanU5 = $penggunalulusanUU5 / $penggunalulusanData;
        $penggunalulusanUU6 = Penggunalulusan::where('status', 1)->sum('u6');
        $penggunalulusanU6 = $penggunalulusanUU6 / $penggunalulusanData;
        $penggunalulusanUU7 = Penggunalulusan::where('status', 1)->sum('u7');
        $penggunalulusanU7 = $penggunalulusanUU7 / $penggunalulusanData;
        $penggunalulusanUU8 = Penggunalulusan::where('status', 1)->sum('u8');
        $penggunalulusanU8 = $penggunalulusanUU8 / $penggunalulusanData;
        $penggunalulusanUU9 = Penggunalulusan::where('status', 1)->sum('u9');
        $penggunalulusanU9 = $penggunalulusanUU9 / $penggunalulusanData;

        
        return view('admin.pages.dashboard.indexpengguna', compact(
            'penggunalulusanData',
            'penggunalulusanU1',
            'penggunalulusanU2',
            'penggunalulusanU3',
            'penggunalulusanU4',
            'penggunalulusanU5',
            'penggunalulusanU6',
            'penggunalulusanU7',
            'penggunalulusanU8',
            'penggunalulusanU9',
        ));
    }
}
