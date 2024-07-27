<?php

use App\Http\Middleware\EnrolledCustomer;
use App\Http\Middleware\EnsureCustomerIsVerified;
use App\Http\Middleware\UnknownClient;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'enrolled.customer' => EnrolledCustomer::class,
            'unknown_client' => UnknownClient::class,
            'verify.otp' => EnsureCustomerIsVerified::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
