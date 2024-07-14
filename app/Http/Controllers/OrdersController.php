<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
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
  

   
    public function index(){
        $statuses = ['completed', 'pending', 'canceled'];

        // Get the orders with the specified statuses
        $orders = Order::whereIn('status', $statuses)->get();

        return view('orders.index',['orders'=>$orders]);
    }

  
    public function edit(Order $order)
    {
        return view('orders.edit',['order'=>$order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Order $order)
    {
        $request->validate([
            'status'=>'required',
        ]);

        $order->note = $request->has('note')? $request->input('note'):"order note";
        $order->status = $request->input('status');
        $order->is_online = $request->input('status')==='completed'?0:1;
        $order->save();

        $invoice = $order->invoice;
        $invoice->is_online = $order->is_online;

        if($order->status==='completed'){
            $invoice->status = 'paid';
        }
        elseif($order->status==='pending'){
            $invoice->status = 'unpaid';
        }
        elseif($order->status==='canceled'){
            $invoice->status = 'canceled';
        }
        $invoice->save();

        return redirect()->route('orders.index')->with('success','order has been updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
