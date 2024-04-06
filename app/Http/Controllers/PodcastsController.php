<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;

class PodcastsController extends Controller
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
        $podcasts = Podcast::all();

        return view('podcasts.index',['podcasts'=>$podcasts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('podcasts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
        ]);

        $podcast = new Podcast();
        $podcast->user_id = auth()->user()->id;
        $podcast->title = strip_tags($request->input('title'));
        $podcast->description = strip_tags($request->input('description'));
        $podcast->audio_url = strip_tags($request->input('audio'));

        $podcast->save();
        return redirect()->route('podcasts.index')->with('success','podcasy created successfully');

        

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
        $podcast = Podcast::findOrFail($id);

        return view('podcasts.edit',['podcast'=>$podcast]);
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
        $request->validate([
            'title'=>'required',
            'audio'=>'required',
        ]);

        $podcast = Podcast::findOrFail($id);
        
        $podcast->title = strip_tags($request->input('title'));
        $podcast->description = strip_tags($request->input('description'));
        $podcast->audio_url = strip_tags($request->input('audio'));
        $podcast->is_online = $request->has('is_online')?1:0 ;
        $podcast->is_free = $request->has('is_free')?1:0 ;
        $podcast->status = strip_tags($request->input('status'));


        $podcast->save();
        return redirect()->route('podcasts.index')->with('success','podcasy updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Podcast::destroy($id);
        return redirect()->route('podcasts.index')->withErrors(['fail' => 'podcast has been deleted']);
    }

    public function updateStatus(Request $request, Podcast $podcast)
    {
        // Toggle the is_online status
        $podcast->update(['is_online' => !$podcast->is_online]);

        return back()->with('success', 'Status updated successfully');
    }
}
