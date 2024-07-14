<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CaptureIntendedUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Only capture intended URL if user is not authenticated
        if (! $request->user()) {
           
            if ($request->has('hiddenCart')) {
                // Store the intended URL in session
                session(['url.intended'=>1]);
            }
        }

        return $next($request);
    }
}
