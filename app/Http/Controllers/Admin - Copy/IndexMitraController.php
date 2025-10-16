<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mitra;

class IndexMitraController extends Controller
{
    public function indexmitra()
    {
        $mitraData = Mitra::where('status', 1)->count();

        $mitraUU1 = Mitra::where('status', 1)->sum('u1');
        $mitraU1 = $mitraUU1 / $mitraData;
        $mitraUU2 = Mitra::where('status', 1)->sum('u2');
        $mitraU2 = $mitraUU2 / $mitraData;
        $mitraUU3 = Mitra::where('status', 1)->sum('u3');
        $mitraU3 = $mitraUU3 / $mitraData;
        $mitraUU4 = Mitra::where('status', 1)->sum('u4');
        $mitraU4 = $mitraUU4 / $mitraData;
        $mitraUU5 = Mitra::where('status', 1)->sum('u5');
        $mitraU5 = $mitraUU5 / $mitraData;
        $mitraUU6 = Mitra::where('status', 1)->sum('u6');
        $mitraU6 = $mitraUU6 / $mitraData;
        $mitraUU7 = Mitra::where('status', 1)->sum('u7');
        $mitraU7 = $mitraUU7 / $mitraData;
        $mitraUU8 = Mitra::where('status', 1)->sum('u8');
        $mitraU8 = $mitraUU8 / $mitraData;
        $mitraUU9 = Mitra::where('status', 1)->sum('u9');
        $mitraU9 = $mitraUU9 / $mitraData;

        return view('admin.pages.dashboard.IndexMitra', compact(
            'mitraData',
            'mitraU1',
            'mitraU2',
            'mitraU3',
            'mitraU4',
            'mitraU5',
            'mitraU6',
            'mitraU7',
            'mitraU8',
            'mitraU9',
        ));
    }
}
