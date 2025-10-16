<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataAlumniController extends Controller
{
    public function dataalumni ()
    {return view('admin.pages.dashboard.dataalumni');
    }

}
