<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\ShippingCompany;


class ShippingCompanyController extends Controller
{
    public function index(){
        return view('shippingCompanies.index',['companies'=>ShippingCompany::all()]);
    }

    public function create(){
        return view('shippingCompanies.create',['countries'=>Country::where('is_online',1)->get()]);
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'country_id'=>'required',

        ]);

        $shippingCompany = new ShippingCompany();
        $shippingCompany->user_id = auth()->user()->id;
        $shippingCompany->name = strip_tags($request->input('name'));
        $shippingCompany->country_id = strip_tags($request->input('country_id'));
        $shippingCompany->save();

        return redirect()->route('shipping-companies.index')->with('success','shipping company has been created successfully');
    }

    public function edit($uuid){
        $shippingCompany = ShippingCompany::where('uuid',$uuid)->first();
        return view('shippingCompanies.edit',['company'=>$shippingCompany,'countries'=>Country::where('is_online',1)->get()]);

    }


    public function update(Request $request , $uuid){
        $request->validate([
            'name'=>'required',
            'country_id'=>'required',

        ]);

        $shippingCompany = ShippingCompany::where('uuid',$uuid)->first();
        $shippingCompany->name= strip_tags($request->input('name'));
        $shippingCompany->description= strip_tags($request->input('description'));
        $shippingCompany->is_online = $request->has('is_online')?1:0;
        $shippingCompany->save();


        return redirect()->route('shipping-companies.index')->with('success','shipping company has been updated successfully');

    }


    // show info of offline companies (their country is offline so they cannot be edited)
    public function showOffline($uuid){
        $company = ShippingCompany::where('uuid',$uuid)->first();
        return view('shippingCompanies.show-offline',compact('company'));
    }
}
