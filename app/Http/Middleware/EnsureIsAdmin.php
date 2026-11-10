<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user || ! in_array($user->role, ['owner', 'admin'], true)) {
            abort(403, 'Akses hanya terbatas untuk administrator.');
        }

        return $next($request);
    }
}
