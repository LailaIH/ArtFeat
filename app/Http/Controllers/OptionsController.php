<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OptionsController extends Controller
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
        $options = Option::whereNotIn('key',['main page first image','main page second image','main page third image'])->get(); // Assuming there's only one row in the options table

        return view('options.index', ['options'=>$options]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('options.create');
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
            'key'=>'required|string',
            'value'=>'required|string',

        ]);

        $option = new Option();
        $option->user_id = auth()->user()->id;
        $option->key = strip_tags($request->input('key'));
        $option->value = strip_tags($request->input('value'));

        $option->save();
        return redirect()->route('options.index')->with('success', 'Option created successfully.');;


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
        $option = Option::findOrFail($id);
        return view('options.edit',['option'=>$option]);
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
       'value'=>'required|string',
        ]);

        $option = Option::findOrFail($id);
        $option->value = strip_tags($request->input('value'));
        $option->save();

        return redirect()->route('options.index')->with('success', 'Option updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Option::destroy($id);
        return redirect()->route('options.index')->withErrors(['fail' => 'Option has been deleted']);
    }


    // for main page slider's images

    public function showImagesOptions(){

        $options = Option::whereIn('key', ['main page first image', 'main page second image','main page third image'])->get();
        return view('options.mainImages',compact('options'));
    
    }

    public function editImageOption($id){
        $option = Option::findOrFail($id);
        return view ('options.editImage',compact('option'));
    }

    public function updateImageOption(Request $request , $id){
        $option = Option::findOrFail($id);

        if($request->hasFile('img')){
            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalName();
           
            $image->move(public_path('optionImages'), $imageName);
            $option->img = $imageName;
            $option->save();
  
        }

        return redirect()->route('options.showImages')->with('success','image was updated successfully');

        


    }
}
