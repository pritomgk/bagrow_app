<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\EmailVerifiedMiddleware;
use App\Http\Middleware\EmailVerifyMiddleware;
use App\Http\Middleware\LoginAdminMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
        'admin' => AdminMiddleware::class,
        'logged_in_admin' => LoginAdminMiddleware::class,
        'email_verify' => EmailVerifyMiddleware::class,
        'email_verified' => EmailVerifiedMiddleware::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();


    