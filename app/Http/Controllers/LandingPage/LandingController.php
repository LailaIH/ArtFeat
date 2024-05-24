<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Product;
use App\Models\User;
use App\Models\Option;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function welcome()
    {
        $sections = Section::take(5)->get(); // get the first 5 sections
        $products = Product::orderBy('created_at', 'desc')->take(40)->get(); // get the last 40 products
        $artists = User::where('is_artist', true)->get();
        $whyArtfeatText = Option::where('key', 'why_artfeat_text')->value('value');


        return view('welcome',['sections'=>$sections ,
        'products'=>$products,
        'artists'=>$artists,
        'whyArtfeatText'=>$whyArtfeatText,
    ]);
    }

    public function switch ($locale) {
        if(in_array($locale, ['ar', 'en'])){
            
           if (Auth::user()){
               $user = User::findOrFail(auth()->user()->id);
               $user->language = $locale;
               $user->save();
           }
           else{
            session()->put('locale', $locale);
           }
       
   }
        return redirect()->back(); 
   
   }

    public function discover(){

       // $artists = User::where('is_artist', true)->get();
        $artists = User::where('is_artist', true)->paginate(3);


        return view('discover',['artists'=>$artists]);

    }


    public function allSections(){
        
        return view('all-sections',['sections'=>Section::all()]);
    }



}
