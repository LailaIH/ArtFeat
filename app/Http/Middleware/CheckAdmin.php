<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
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
        if ( auth()->user()->job_title_id==null) {
            return redirect()->route('welcome')->withErrors(['fail' => 'UnAuthorized Access']);
        }
            elseif(auth()->user()->jobTitle->name != 'admin'){
                return redirect()->route('welcome')->withErrors(['fail' => 'UnAuthorized Access']);

            }
        
    return $next($request);
}
}