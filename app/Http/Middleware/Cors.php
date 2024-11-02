<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Allow CORS for specific origins
        $response->headers->set('Access-Control-Allow-Origin', '*'); // Use '*' to allow all origins or specify a domain
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Authorization, X-Requested-With');

        // Handle preflight requests
        if ($request->isMethod('OPTIONS')) {
            return response('', 200);
        }

        return $response;
    }
}
