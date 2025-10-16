<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataMasyarakatController extends Controller
{
    public function datamasyarakat ()
    {return view('admin.pages.dashboard.datamasyarakat');
    }

}
