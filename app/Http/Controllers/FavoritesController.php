<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{



    public function myFav(){
        $user_id = auth()->user()->id;
        $favorites = Favorite::where('user_id',$user_id)->get();
        $products = [];
        foreach($favorites as $favorite){
            $products[] = $favorite->product;

        }
        return view('landing.myFavorites',compact('products'));

    }


    public function addToFavorites($productId){

        $user_id = auth()->user()->id;
        Favorite::create([
            'user_id'=>$user_id,
            'product_id'=>$productId,
        ]);

        return redirect()->route('myFav');
    }

    public function removeFromFavorites($productId){
        $user_id = auth()->user()->id;
        $favorite = Favorite::where('user_id',$user_id)->where('product_id',$productId)->first();
        Favorite::destroy($favorite->id);
        return redirect()->back();

    }
}
