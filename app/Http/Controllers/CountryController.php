<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index(){
        return view('countries.index',['countries'=>Country::all()]);
    }

    public function create(){
        return view('countries.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',

        ]);

        $country = new Country();
        $country->user_id = auth()->user()->id;
        $country->name = strip_tags($request->input('name'));
        $country->save();

        return redirect()->route('countries.index')->with('success','country has been created successfully');
    }

    public function edit($uuid){
        $country = Country::where('uuid',$uuid)->first();
        return view('countries.edit',['country'=>$country]);

    }


    public function update(Request $request , $uuid){
        $request->validate([
            'name'=>'required',

        ]);

        $country = Country::where('uuid',$uuid)->first();
        $country->name= strip_tags($request->input('name'));
        $country->is_online = $request->has('is_online')?1:0;
        $country->save();

        if(!$country->is_online){
            $country->shippingCompanies()->update(['is_online' => 0]);
        }

        return redirect()->route('countries.index')->with('success','country has been updated successfully');

    }
}
