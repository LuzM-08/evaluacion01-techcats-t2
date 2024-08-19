<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Middleware global to all routes
    protected $middleware = [
        // Other middleware
    ];

    // Middleware groups for specific routes
    protected $middlewareGroups = [
        'web' => [
            // Middleware for web routes
        ],
        'api' => [
            // Middleware for API routes
        ],
    ];

    // Registering route-specific middleware
    protected $routeMiddleware = [
        // Your middleware here
        'jwt.auth' => \App\Http\Middleware\JwtMiddleware::class,
    ];
}
