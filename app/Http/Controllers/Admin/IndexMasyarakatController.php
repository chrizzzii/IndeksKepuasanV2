<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;

class IndexMasyarakatController extends Controller
{
    public function indexmasyarakat()
    {
        $masyarakatData = Masyarakat::where('status', 1)->count();

        return view('admin.pages.dashboard.IndexMasyarakat', compact('masyarakatData'));;
    }
}
