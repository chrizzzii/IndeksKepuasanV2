<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataDosenController extends Controller
{
    public function datadosen ()
    {return view('admin.pages.dashboard.datadosen');
    }

}
