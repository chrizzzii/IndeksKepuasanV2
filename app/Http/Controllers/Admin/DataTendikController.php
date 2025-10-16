<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataTendikController extends Controller
{
    public function datatendik ()
    {return view('admin.pages.dashboard.datatendik');
    }

}
