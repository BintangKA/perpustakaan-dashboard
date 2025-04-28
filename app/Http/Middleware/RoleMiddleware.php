<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        Log::info("User role: " . $user->role);

        if (!in_array($user->role, $roles)) {
            Log::info("Unauthorized access attempt with role: " . $user->role);
            abort(403, 'Unauthorized access.');
        }
        return $next($request);
    }
}
