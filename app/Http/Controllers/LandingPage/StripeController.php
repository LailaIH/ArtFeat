<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class StripeController extends Controller
{


    public function checkout(){

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $user =  Auth::user(); 
        //$carts = $user->carts ;
        $carts = Cart::where('user_id',$user->id)->where('is_online',1)->get();
        if($carts){
            $products=[];
            foreach($carts as $cart){
                $products[] = $cart->product ;
            }

        $lineItems = [];
        $totalPrice = 0;
        foreach ($products as $product) {
            $totalPrice += $product->price;
            $cart = Cart::where('user_id',$user->id)->where('product_id',$product->id)->first();
            $quantity = $cart->quantity;
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name, 
                       
                        
                    ],
                    'unit_amount' => $product->price * 100, // ask
                ],
                'quantity' => $quantity,
            ];
        }

        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => "http://127.0.0.1:8000/success?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => "http://127.0.0.1:8000/cancel?session_id={CHECKOUT_SESSION_ID}",
        ]);

        foreach($products as $product){
        $cart = Cart::where('user_id',$user->id)->where('product_id',$product->id)->first();
        $quantity = $cart->quantity;
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->product_id = $product->id ;
            $order->status = 'pending';
            $order->session_id = $session->id;
            $order->save();
            
            $invoice = new Invoice();
            $invoice->user_id = auth()->user()->id;
            $invoice->order_id = $order->id ;
            $invoice->total_price = $order->product->price * $quantity ;
            $invoice->status = 'unpaid';
            $invoice->session_id = $session->id;
        $invoice->save();

        }
        return redirect($session->url);

        //end if $carts
        }
        else{
            return redirect()->back()->withErrors(['fail' => 'No Carts Associated With This User']);

        }

    }

    private function commonOrderAndInvoice($sessionId){

        $orders = Order::where('session_id', $sessionId)->get();
        $invoices = Invoice::where('session_id', $sessionId)->get();
        $numberOfItems = count($orders);
            if (!$orders || !$invoices) {
                throw new NotFoundHttpException();
            }
            
            for($i=0 ; $i<$numberOfItems;$i++){
            if ($orders[$i]->status === 'pending') {
                $orders[$i]->status = 'completed';
                $orders[$i]->is_online = 0 ;    
                $orders[$i]->save();
            }
            if($invoices[$i]->status === 'unpaid'){
                $invoices[$i]->status = 'paid';
                $invoices[$i]->is_online = 0 ;
                $invoices[$i]->save();

            }
            
            
    }
            

       $user = Auth::user();  
       $carts = Cart::where('user_id',$user->id)->where('is_online',1)->get();
       foreach($carts as $cart){
        $cart->is_online = 0;
        $cart->save();
       }
       


            
}

    public function success(Request $request){

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $sessionId = $request->query('session_id');
        if (!$sessionId) {
            throw new NotFoundHttpException('Session ID is missing.');
        }
            else{
                $orders = Order::where('session_id', $sessionId)->get();
                $invoices = Invoice::where('session_id', $sessionId)->get();
                if ($orders->isEmpty() || $invoices->isEmpty()) {
                    throw new NotFoundHttpException('Invalid session ID.');
                }
           $this->commonOrderAndInvoice($sessionId);

           $finalInvoices = Invoice::where('session_id', $sessionId)->where('is_online',0)->get();
           $total = $finalInvoices->sum('total_price');
           $products = [];
           foreach($finalInvoices as $invoice){
            $products[] = [
                'name' => $invoice->order->product->name ,
                'price' => $invoice->order->product->price ,
                'quantity' => $invoice->total_price / $invoice->order->product->price ,
                'invoice' => $invoice->total_price,
                'image'=> $invoice->order->product->img,
                
                

            ] ;
           }

            return view('checkout-success' , ['products'=>$products , 'total'=>$total])->with('success','payment has been completed successfully'); 
            }
        } 


        public function cancel(Request $request){
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $sessionId = $request->query('session_id');

            $orders = Order::where('session_id',$sessionId);
            $invoices = Invoice::where('session_id',$sessionId);

            if (!$orders || !$invoices) {
                throw new NotFoundHttpException();
            } 

            $countItems = count($orders);
            for($i=0 ; $i<$countItems;$i++){
                if ($orders[$i]->status === 'pending') {
                    $orders[$i]->status = 'canceled';
                    
                    $orders[$i]->save();
                }
                if($invoices[$i]->status === 'unpaid'){
                    $invoices[$i]->status = 'canceled';
                    
                    $invoices[$i]->save();
    
                }
    
        }


            return view('checkout-cancel');
        }


   public function webhook(){
    // This is your Stripe CLI webhook secret for testing your endpoint locally.
    $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

    $payload = @file_get_contents('php://input');
    $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
    $event = null;

    try {
        $event = \Stripe\Webhook::constructEvent(
            $payload, $sig_header, $endpoint_secret
        );
    } catch (\UnexpectedValueException $e) {
        // Invalid payload
        return response('', 400);
    } catch (\Stripe\Exception\SignatureVerificationException $e) {
        // Invalid signature
        return response('', 400);
    }

// Handle the event
    switch ($event->type) {
        case 'checkout.session.completed':
            $session = $event->data->object;

         $this->commonOrderAndInvoice($session->id);

        // ... handle other event types
        default:
            echo 'Received unknown event type ' . $event->type;
    }

    return response('');
   }



    }




