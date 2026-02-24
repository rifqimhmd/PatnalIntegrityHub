<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();

        if (!$user || $user->nama_role !== $role) {
            return redirect('/' . $user->nama_role);
        }

        return $next($request);
    }
}
