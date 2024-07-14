<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        
        return view('supports.index',['supports'=>Support::all()]);
    }

    public function create(){

        return view('supports.create');
    }

    public function validated(Request $request){

       
        $validatedData = $request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

       

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('supportsImages'), $imageName);
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
        ];
        $final = array_merge($data,$additional);
        Support::create($final);
        return redirect()->route('supports.index')->with('success','support article has been created successfully');

    }

    public function edit($id){
        $support = Support::findOrFail($id);
        return view('supports.edit',compact('support'));
    }

    public function update(Request $request,$id){
        $support = Support::findOrFail($id);
        $data = $this->validated($request);
        $additional = [
            'is_online' => $request->has('is_online')?1:0,
        ];
        $final = array_merge($data,$additional);

        $support->update($final);
        return redirect()->route('supports.index')->with('success','support article has been updated successfully');
    }
}
