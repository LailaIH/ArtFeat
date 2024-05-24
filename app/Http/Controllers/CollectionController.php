<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artist;
use App\Models\Collection;
use App\Models\Product;

class CollectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('collections.index',['collections'=>Collection::orderBy('created_at', 'desc')->get()]);
    }

    public function create(){

        return view('collections.create',['artists'=>Artist::all()]);
    }

    public function store(Request $request){

        $request->validate([
        'artist_id'=>'required',
        'name'=>'required',
        ]);

        $collection = new Collection();
        $collection->user_id = auth()->user()->id;
        $collection->artist_id = strip_tags($request->input('artist_id'));
        $collection->name= strip_tags($request->input('name'));

        $collection->save();
        return redirect()->route('collections.index')->with('success','collection have been created successfully');

    }

    public function edit(Collection $collection){
        return view('collections.edit',['collection'=>$collection]);
    }



    public function update(Request $request ,Collection $collection){
        $request->validate([
           
            'name'=>'required',
            ]);

        $collection->name= strip_tags($request->input('name'));
        $collection->description = strip_tags($request->input('description'));
        $collection->is_online = $request->has('is_online')?1:0;
        $collection->save();
        
        if($collection->is_online){
        $collection->products()->update(['is_online' => 1]);
        }
        else{
            $collection->products()->update(['is_online' => 0]);

        }
        return redirect()->route('collections.index')->with('success','collection have been updated successfully');


    }
    
}
