<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Get the authenticated user
        $user = $request->user();

        // Check whether the user is authenticated
        if (!$user) {
            return response()->json([
                'message' => 'Unauthenticated.',
            ], 401);
        }

        // Check whether the user's role is allowed
        if (!in_array($user->role, $roles, true)) {
            return response()->json([
                'message' => 'You do not have permission to access this resource.',
            ], 403);
        }

        // Allow the request to continue
        return $next($request);
    }
}
