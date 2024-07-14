<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        
        return view('events.index',['events'=>Event::all()]);
    }

    public function create(){

        return view('events.create');
    }

    public function validated(Request $request){

       
        $validatedData = $request->validate([
            'title'=>'required',
            'description'=>'required',
            
            
        ]);

       

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = $image->getClientOriginalName();

            $destinationPath = public_path('eventsImages'); 
            if (!file_exists($destinationPath . '/' . $imageName)) {

            $image->move(public_path('eventsImages'), $imageName);
            }
            $additional = [
                'img'=>$imageName,
               
            ];
    
            $data = array_merge($validatedData,$additional);
            return $data;
           
        }

      
        return $validatedData;

       
    }

    public function store(Request $request){
        $data = $this->validated($request);
        $additional = [
            'user_id'=>auth()->user()->id,
            'starts_at'=>$request->input('starts_at'),
        ];
        $final = array_merge($data,$additional);
        Event::create($final);
        return redirect()->route('events.index')->with('success','event has been created successfully');

    }

    public function edit($id){
        $event = Event::findOrFail($id);
        return view('events.edit',compact('event'));
    }

    public function update(Request $request,$id){
        $event = Event::findOrFail($id);
        $data = $this->validated($request);
        $additional = [
            'is_online' => $request->has('is_online')?1:0,
            'starts_at'=>$request->input('starts_at'),
        ];
        $final = array_merge($data,$additional);

        $event->update($final);
        return redirect()->route('events.index')->with('success','event has been updated successfully');
    }
}
