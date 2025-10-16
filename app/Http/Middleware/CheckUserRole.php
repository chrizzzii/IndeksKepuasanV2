<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; // Tambahkan ini
use Illuminate\Support\Facades\Session; // Tambahkan ini

class CheckUserRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Ambil role dari session
        $userRole = Session::get('user_role');

        // Cek apakah role pengguna ada dalam daftar role yang diizinkan
        if (!in_array($userRole, $roles)) {
            return redirect('login')->withErrors(['access' => 'Anda tidak memiliki akses ke halaman ini.']);
        }

        return $next($request);
    }

}
