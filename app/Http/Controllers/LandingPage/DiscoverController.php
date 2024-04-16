<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Product;
use App\Models\User;
use App\Models\Option;
use Illuminate\Pagination\Paginator;



class DiscoverController extends Controller
{


    public function discover(){

        // $artists = User::where('is_artist', true)->get();
         $artists = User::where('is_artist', true)->paginate(6);
 
 
         return view('discover',['artists'=>$artists]);
 
     }

    



}