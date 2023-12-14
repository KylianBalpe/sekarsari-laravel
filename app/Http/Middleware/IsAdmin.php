<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (!$user || ($user->role != 1 && $user->role != 2)) {
            toastr()->error('Anda tidak memiliki akses!', '403', ['closeButton' => true]);
            Auth::logout();

            // Redirect to the login page
            return redirect()->route('login');
        }

        return $next($request);
    }
}
