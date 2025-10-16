<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataPenggunaController extends Controller
{
    public function datapengguna ()
    {return view('admin.pages.dashboard.datapengguna');
    }

}
