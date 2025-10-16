<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataMitraController extends Controller
{
    public function datamitra ()
    {return view('admin.pages.dashboard.datamitra');
    }

}
