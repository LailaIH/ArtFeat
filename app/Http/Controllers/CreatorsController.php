<?php

namespace App\Http\Controllers;

use App\Models\Creator;
use Illuminate\Http\Request;

class CreatorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('creators.index',['creators'=>Creator::all()]);
    }

    public function create(){
        return view('creators.create');
    }

    public function validated(Request $request){

       
        $validatedData = $request->validate([
            'name'=>'required',
            'description'=>'required',
            
            
        ]);

       

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = $image->getClientOriginalName();

            $destinationPath = public_path('creatorsImages');
            if (!file_exists($destinationPath . '/' . $imageName)) {

            $image->move(public_path('creatorsImages'), $imageName);
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
        Creator::create($data);
        return redirect()->route('creators.index')->with('success','creator has been created successfully');

            
        }

        public function edit($id){
            $creator = Creator::findOrFail($id);
            return view('creators.edit',compact('creator'));
        }
    
        public function update(Request $request,$id){
            $creator = Creator::findOrFail($id);
            $data = $this->validated($request);
            $additional = [
                'is_online' => $request->has('is_online')?1:0,
            ];
            $final = array_merge($data,$additional);
    
            $creator->update($final);
            return redirect()->route('creators.index')->with('success','creator has been updated successfully');
        }    

        


    }

