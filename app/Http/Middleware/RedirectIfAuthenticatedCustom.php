<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedCustom
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth('admin')->check()) {
            return redirect()->route('dashboard.admin');
        }

        if (auth('doctor')->check()) {
            return redirect()->route('dashboard.doctor');
        }

        if (auth('ray_employee')->check()) {
            return redirect()->route('dashboard.ray_employee');
        }

        if (auth('laboratorie_employee')->check()) {
            return redirect()->route('dashboard.laboratorie_employee');
        }

        if (auth('patient')->check()) {
            return redirect()->route('dashboard.patient');
        }

        if (auth('web')->check()) {
            return redirect()->route('dashboard.user');
        }


        return $next($request);
    }
}
