<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artist;



class ArtistsController extends Controller
{

    // For Admin Panel
    // public function create(){

    //     return view('artists.create');
    // }

    // public function store(Request $request){
    //    $request->validate([
    //     'name'=>'required',
    //     'email'=>'required|string|unique:users,email',
    //     'password'=>'required|string',

    //    ]);

    //    $user = new User();
    //    $user->name = strip_tags($request->input('name'));
    //    $user->password = bcrypt($request->input('password'));
    //    $user->email = strip_tags($request->input('email'));
    //    $user->is_artist = true;
    //    $user->save();

    //    $artist = new Artist();
    //    $artist->user_id = auth()->user()->id;
    //    $artist->name = strip_tags($request->input('name'));
    //    $artist->store_name = strip_tags($request->input('store_name'));
    //    $artist->country = strip_tags($request->input('country'));
    //    $artist->city = strip_tags($request->input('city'));

    //    $artist->save();




    // }




    
}
