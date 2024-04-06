<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Models\Auction;

class AuctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        $auctions = Auction::all();
        return view('auctions.index' , ['auctions'=>$auctions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auctions.create');
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $auction = new Auction();
       $request->validate([
        'title'=>'required',
        'start_time'=>'required',
        'end_time'=>'required',
        'starting_price'=>'required',
        
    ]);
    $auction->user_id = auth()->user()->id;
    $auction->title = strip_tags($request->input('title'));
    $auction->description = strip_tags($request->input('description'));
    $auction->start_time = strip_tags($request->input('start_time'));
    $auction->end_time = strip_tags($request->input('end_time'));
    $auction->starting_price = strip_tags($request->input('starting_price'));

    $auction->save();
    return redirect()->route('auctions.index')->with('success','Auction has been created successfully');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auction = Auction::findOrFail($id);

        return view('auctions.edit' , ['auction'=>$auction]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $auction = Auction::findOrFail($id);

        $request->validate([
            'title'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'starting_price'=>'required',
        ]);    

        $auction->title = strip_tags($request->input('title'));
        $auction->status = strip_tags($request->input('status'));
        $auction->is_online = $request->has('is_online')? 1:0;
        $auction->description = strip_tags($request->input('description'));
        $auction->start_time = strip_tags($request->input('start_time'));
        $auction->end_time = strip_tags($request->input('end_time'));
        $auction->starting_price = strip_tags($request->input('starting_price'));
    
        $auction->save();
        return redirect()->route('auctions.index')->with('success','Auction has been updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Auction::destroy($id);
        return redirect()->route('auctions.index')->withErrors(['fail' => 'Auction has been deleted']);
    }

    public function showSettings()
    {
        $option = Option::firstOrFail();
        //dd($option); // Debugging statement
        return view('options.settings');
    }
}
