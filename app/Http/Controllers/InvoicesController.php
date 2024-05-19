<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\User;
use App\Models\Order;


use Illuminate\Http\Request;

class InvoicesController extends Controller
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


   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('invoices.edit',['invoice'=>$invoice ,
            'users'=>User::all(),
            'orders'=>Order::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            
            'total_price'=>'required',
            'status'=>'required',
        ]);
        
        $invoice->total_price = strip_tags($request->input('total_price'));
        $invoice->status = strip_tags($request->input('status'));
        $invoice->is_online = $request->input('status')==='paid'?0:1;


        $invoice->save();

        $order = $invoice->order ;
        $order->is_online = $invoice->is_online;
        if($invoice->status==='paid'){
            $order->status = 'completed';
        }
        elseif($invoice->status==='unpaid'){
            $order->status = 'pending';
        }
        elseif($invoice->status==='canceled'){
            $order->status = 'canceled';
        }
        $order->save();

        return redirect()->route('invoices.'.$invoice->status)->with('success','invoice has been updated successfully');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    public function showUnpaidInvoices()
    {
        $pendingInvoices = Invoice::where('status', 'unpaid')->get();
        return view('invoices.unpaid')->with('invoices', $pendingInvoices);
    }

    public function showPaidInvoices()
    {
        $completedInvoices = Invoice::where('status', 'paid')->get();
        return view('invoices.paid')->with('invoices', $completedInvoices);
    }

    public function showCanceledInvoices()
    {
        //return 'OK';
        $canceledInvoices = Invoice::where('status', 'canceled')->get();
        return view('invoices.canceled')->with('invoices', $canceledInvoices);
    }
}
