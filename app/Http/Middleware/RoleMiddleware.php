<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use UnitEnum;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();
        $role = $user?->role instanceof UnitEnum ? $user->role->value : $user?->role;

        if (! $user || ! in_array($role, $roles, true)) {
            if (! $request->expectsJson() && ! $request->is('api/*')) {
                abort(Response::HTTP_FORBIDDEN);
            }

            return response()->json([
                'success' => false,
                'message' => 'Forbidden.',
                'errors' => [],
            ], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
