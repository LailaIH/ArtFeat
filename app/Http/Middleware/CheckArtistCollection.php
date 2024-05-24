<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Collection;

class CheckArtistCollection
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
        $collectionId= $request->route('id');
        $collection = Collection::findOrFail($collectionId);
        if(!$collection){
           abort(404);
        }
      

        if(auth()->user()->artist && $collection->artist_id === auth()->user()->artist->id){
        return $next($request);
        }

        else{
            return redirect()->route('welcome')->withErrors(['fail' => 'UnAuthorized Access']);

        }
    }
}
