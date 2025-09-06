<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Global middleware (runs on every request)
        // $middleware->append(\App\Http\Middleware\TrustHosts::class);

        // Route middleware (was `$routeMiddleware` in Kernel.php)
        $middleware->alias([
            'jwt.auth' => \App\Http\Middleware\AuthenticateWithJwt::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
