<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showArtists()
    {
        $artists = User::where('is_artist', 1)->get();
        //return $artists;
        return view('users.artists')->with('artists', $artists);
    }

    public function showNonArtists()
    {
        $nonArtists = User::where('is_artist', 0)->get();
        return view('users.non-artists')->with('nonArtists', $nonArtists);
    }
}
