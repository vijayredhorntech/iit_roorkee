<?php
use App\Providers\RepositoryServiceProvider;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AuthMiddleware; // Correct namespace import

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->append(AuthMiddleware::class); // Now correctly references the class
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->withProviders([
        RepositoryServiceProvider::class, // Manually register the provider
    ])->create();
