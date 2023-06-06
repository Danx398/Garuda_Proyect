<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class nocache
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Desactivar la caché
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');

        return $response;


        // $response = $next($request);
        // return $response
        //     ->header('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate')
        //     ->header('Pragma', 'no-cache')
        //     ->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');

    }
}
