<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token || !User::where('api_token', $token)->first()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->setUserResolver(function () use ($token) {
            return User::where('api_token', $token)->first();
        });

        return $next($request);
    }
}
