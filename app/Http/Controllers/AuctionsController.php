<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\User;

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







    // show users who added end prices for a specific auction

    public function showPrices($id){
        $auction = Auction::findOrFail($id);
       
        return view('auctions.show-added-prices', compact('auction'));


    }



    // show the view for a user to add a price
    public function showAddPrice($id){
        $auction = Auction::findOrFail($id);
        $users = User::all();
        return view('auctions.show-price-add',compact('auction','users'));
    }

    // add price by a user to an auction
    public function addPrice(Request $request , $id){
        $auction = Auction::findOrFail($id);
        $endPrice = $request->input('ending_price');

        if (($auction->ending_price == 0 && $endPrice > $auction->starting_price) || ($auction->ending_price!=0 && $endPrice > max($auction->ending_price , $auction->starting_price))) {  // max is for : if the admin changes start price to a number that is larger than the current ending price     
            $auction->participants()->attach($request->input('user_id'),  ['ending_price' => $endPrice]);
           
                $auction->ending_price = $endPrice;
                $auction->save();
            
        }

        else{
            return back()->withErrors(['fail'=>'enter a price that is greater than the current price']);
        }

        return redirect()->route('auctions.showPrices',$id)->with('success','price added successfully');

    }
}
