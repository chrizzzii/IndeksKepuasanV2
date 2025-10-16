<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataMahasiswaController extends Controller
{
    public function datamahasiswa ()
    {return view('admin.pages.dashboard.datamahasiswa');
    }

}
