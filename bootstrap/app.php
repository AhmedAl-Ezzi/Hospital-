<?php

use App\Http\Middleware\RedirectIfAuthenticatedCustom;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::prefix('admin')
                ->middleware('web')
                ->group(base_path('routes/backend.php'));

            Route::prefix('doctor')
                ->middleware('web')
                ->group(base_path('routes/doctor.php'));

            Route::prefix('ray_employee')
                ->middleware('web')
                ->group(base_path('routes/ray_employee.php'));

            Route::prefix('laboratorie_employee')
                ->middleware('web')
                ->group(base_path('routes/laboratorie_employee.php'));

            Route::prefix('patient')
                ->middleware('web')
                ->group(base_path('routes/patient.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'redirect' => RedirectIfAuthenticatedCustom::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
