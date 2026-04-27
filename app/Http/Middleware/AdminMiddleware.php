<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Ellenőrizzük, hogy a felhasználó be van-e jelentkezve és admin-e
        if (!auth()->check() || !auth()->user()->is_admin) {
            
            // Ha a kérés JSON-t vár, akkor JSON válaszban adjuk vissza a hibát
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Nincs jogosultságod az admin felülethez!'
                ], 403);
            }

            // Webes kérés esetén hagyományos 403-as hibát dobunk
            abort(403, 'Nincs jogosultságod az admin felülethez!');
        }

        return $next($request);
    }
}