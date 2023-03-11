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

        $response->header("Access-Control-Allow-Origin: *");
        $response->header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE");
        $response->header("Access-Control-Allow-Headers: Content-Type");

        return $response;
    }
}
