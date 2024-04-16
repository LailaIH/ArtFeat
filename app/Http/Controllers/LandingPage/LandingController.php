<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Product;
use App\Models\User;
use App\Models\Option;
use Illuminate\Pagination\Paginator;



class LandingController extends Controller
{
    public function welcome()
    {
        $sections = Section::all();
        $products = Product::all();
        $artists = User::where('is_artist', true)->get();
        $whyArtfeatText = Option::where('key', 'why_artfeat_text')->value('value');


        return view('welcome',['sections'=>$sections ,
        'products'=>$products,
        'artists'=>$artists,
        'whyArtfeatText'=>$whyArtfeatText,
    ]);
    }

    public function discover(){

       // $artists = User::where('is_artist', true)->get();
        $artists = User::where('is_artist', true)->paginate(3);


        return view('discover',['artists'=>$artists]);

    }






}
