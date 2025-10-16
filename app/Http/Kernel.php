<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Middleware global
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,


    ];

    protected $routeMiddleware = [
        // Middleware lainnya...
        'check.role' => \App\Http\Middleware\CheckUserRole::class,
    ];
}
