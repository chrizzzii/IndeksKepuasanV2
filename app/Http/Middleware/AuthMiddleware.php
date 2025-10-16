<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Mengecek apakah user telah login
        if (!Session::has('user_id')) {
            // Jika tidak login, redirect ke halaman login
            return redirect('login')->withErrors(['auth' => 'Anda harus login terlebih dahulu!']);
        }

        // Jika sudah login, lanjutkan request
        return $next($request);
    }
}
