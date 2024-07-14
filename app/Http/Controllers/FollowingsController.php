<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Following;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingsController extends Controller
{
   public function follow($artistId){
    $artist = Artist::findOrFail($artistId);
    $user = User::findOrFail(auth()->user()->id);
    $follow = Following::where('artist_id',$artist->id)->where('user_id',auth()->user()->id)->first();
    if(!$follow){
    
   Following::create([
        'user_id' => Auth::user()->id ,
        'artist_id' => $artist->id,
    ]);

    $artist->followers += 1;
    $artist->save();

    $user->following += 1;
    $user->save();


     return redirect()->back();
   }

   else{
    return redirect()->back()->withErrors(['fail'=>'user already follow this artist']);
   }


}

    public function unfollow($artistId){
        $artist = Artist::findOrFail($artistId);
        $user = User::findOrFail(auth()->user()->id);

        $follow = Following::where('artist_id',$artist->id)->where('user_id',auth()->user()->id)->first();

        if($follow){
            Following::destroy($follow->id);
            $artist->followers -= 1;
            $artist->save();
        
            $user->following -= 1;
            $user->save();
            return redirect()->back();
        }

        else{
            return redirect()->back()->withErrors(['fail'=>'the user is not following this artist']);
        }



    }

}
