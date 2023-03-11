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
        header("Access-Control-Allow-Origin: *");

        $headers = [
            'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, DELETE',
            'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin'
        ];

        $response = $next($request);

        foreach($headers as $key => $value) $response->header($key, $value);

        return $response;
    }
}
