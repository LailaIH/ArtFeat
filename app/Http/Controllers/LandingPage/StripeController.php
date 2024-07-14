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
use Illuminate\Support\Str;
use Illuminate\Support\Collection;



class StripeController extends Controller
{

// orders -> status : 'pending' -> before completing stripe's payment
// 'completed' -> after successfully completing stripe payment , 'canceled' -> order canceled for stripe payment
// 'pending wallet' -> before completing wallet's payment , 'completed wallet'-> after successfully completing wallet payment
// 'canceled wallet'-> for canceld orders for wallet payment
// Invoices : status : 'unpaid' -> before completing stripe's payment , 'paid'-> after completing stripe payment ,
// 'canceled' -> canceled invoices for stripe payment 
// 'unpaid wallet' -> before completing wallet payment , 'paid wallet' -> after completing wallet payment successfully ,
// 'canceled wallet' ->  canceled invoices for wallet payment
// 'pending funds' -> one invoice created for filling user funds , before the process is completed
// 'paid funds' -> invoice status for successfully completing getting funds in the user wallet
// 'canceled funds' -> invoice status for canceld funds process



    


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

    private function finalInvoices($sessionId){
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
        return ['products' => $products, 'total' => $total];
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

            $result = $this->finalInvoices($sessionId);
            $products = $result['products'];
            $total = $result['total'];

            return view('checkout-success' , ['products'=>$products , 'total'=>$total])->with('success','payment has been completed successfully'); 
            }
        } 


        public function cancel(Request $request){
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $sessionId = $request->query('session_id');

            $orders = Order::where('session_id',$sessionId)->get();
            $invoices = Invoice::where('session_id',$sessionId)->get();

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

                return redirect()->route('logged_user_cart',auth()->user()->id)->withErrors(['fail' => 'Payment process has been canceled']);
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
            $invoice = Invoice::where('session_id',$session->id)->first();
            if(!$invoice->order_id){ // webhook for funds
               
    
                if($invoice->status==='pending funds'){
                    $invoice->status='paid funds';
                    $invoice->is_online=0; // completed
                    $invoice->save();
    
                    $user = User::findOrFail(Auth::user()->id);
                    $user->funds = $user->funds + $invoice->totoal_price;
                    $user->save();
            }
        }
            else{ // webhook for products payments
 
         $this->commonOrderAndInvoice($session->id);
            }

        // ... handle other event types
        default:
            echo 'Received unknown event type ' . $event->type;
    }

    return response('');
   }




    // stripe for funds

    public function fundsCheckout(Request $request){

            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $user =  Auth::user();
            if($request->input('funds')>0){
            $session = \Stripe\Checkout\Session::create([
                'line_items' => [   [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'fund', 
                           
                            
                        ],
                        'unit_amount' => $request->input('funds') * 100, // ask
                    ],
                    'quantity' => 1,
                ]   ],
                'mode' => 'payment',
                'success_url' => 'http://127.0.0.1:8000/funds/success?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => 'http://127.0.0.1:8000/funds/cancel?session_id={CHECKOUT_SESSION_ID}',
              ]);
        
              $invoice = new Invoice();
              $invoice->user_id = $user->id;
              $invoice->order_id = null;
              $invoice->status ='pending funds';
              $invoice->total_price= $request->input('funds');
              $invoice->session_id=$session->id;
              $invoice->save();
        
              return redirect($session->url);
            }
        
            else{
                return back()->withErrors(['fail' => 'funds should be greater than 0']);
            }
        
        
        
           }

           public function fundSuccess(Request $request){
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $sessionId = $request->query('session_id');
            $user = User::findOrFail(Auth::user()->id);
            if (!$sessionId) {
                throw new NotFoundHttpException('Session ID is missing.');
            }
            else{
                $invoice = Invoice::where('session_id',$sessionId)->first();
                if(!$invoice){
                    throw new NotFoundHttpException('Invalid session ID.');
                }
    
                if($invoice->status==='pending funds'){
                    $invoice->status='paid funds';
                    $invoice->is_online=0; // completed
                    $invoice->save();
    
                  
                    $user->funds = $user->funds + $invoice->total_price;
                    $user->save();
                    
    
    
               
                }
                return view('funds-checkout-success',['userFunds'=>$user->funds]); 

    
            }
        }
    
    
        public function fundsCancel(Request $request){
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $sessionId = $request->query('session_id');
            if (!$sessionId) {
                throw new NotFoundHttpException('Session ID is missing.');
            }
           
            $invoice = Invoice::where('session_id',$sessionId)->first();
    
            if (!$invoice) {
                throw new NotFoundHttpException();
            } 
    
            if($invoice->status==='pending funds'){
                $invoice->status = 'canceled funds';
                $invoice->save();
            }
    
         
    
                return view('funds-checkout-cancel');
        }


     // pay for products with wallet 



       

        // like checkout method
        public function showConfirmPayment(){
            // Check if the session_id is already in the session
            if (!session()->has('session_id')) {
                // Generate a new session_id and store it in the session
                $session_id = (string) Str::uuid();
                session(['session_id' => $session_id]);
            } else {
                // Retrieve the session_id from the session
                $session_id = session('session_id');
            }

            $user = User::where('id',Auth::user()->id)->first();
            $carts = Cart::where('user_id',$user->id)->where('is_online',1)->get();
           
            $total = $carts->sum(function ($cart) {
                return $cart->product->price * $cart->quantity;
            });
           
          
          

                
            foreach($carts as $cart){
                $order = new Order();
                $order->user_id = $user->id;
                $order->product_id = $cart->product_id;
                $order->status = 'pending wallet';
                $order->session_id = $session_id;
                $order->save();


                $invoice = new Invoice();
                $invoice->user_id = $user->id;
                $invoice->order_id = $order->id;
                $invoice->total_price = $cart->product->price * $cart->quantity;
                $invoice->status = 'unpaid wallet';
                $invoice->session_id = $session_id;
                $invoice->save(); 

               
            
        }


        return response()->json([
            'session_id' => $session_id,
            'total' => $total,
        ]);            
            
            
                      
        
        }



        // actual payment (like success)
        public function payWithWallet(Request $request){ 
            $session_id = $request->input('session_id');
            if (!$session_id) {
                throw new NotFoundHttpException('Session ID is missing.');
            }
            $orders = Order::where('session_id',$session_id)->where('status','pending wallet')->get(); // first time accessing the success route
            if ($orders->isEmpty()) {
                throw new NotFoundHttpException('Invalid session ID.');
            }
            $user = User::where('id',Auth::user()->id)->first();
            $userFunds = $user->funds;

            $carts = Cart::where('user_id',$user->id)->where('is_online',1)->get();
           

            $total =0;

            foreach($carts as $cart){
                $total += $cart->product->price * $cart->quantity;
            }

            if($userFunds < $total){
                return redirect()->route('logged_user_cart',$user->id)->withErrors(['fail'=>'your funds don\'t cover product prices , please add funds to your wallet']);
            }

            $remaining_funds = $userFunds - $total ;
            $user->funds = $remaining_funds;
            $user->save();

            foreach($carts as $cart){
                $cart->is_online = 0;
                $cart->save();
            }

                
                $invoices = Invoice::where('session_id',$session_id)->get();

                foreach($orders as $order){
               
                    if($order->status === 'pending wallet'){
                    $order->status='completed wallet';
                    $order->is_online=0;
                    $order->save();

                    $invoice = $order->invoice;

                    $invoice->status ='paid wallet';
                    $invoice->is_online = 0;
                    $invoice->save();
                    }
                    
                }

                $result = $this->finalInvoices($session_id);
                $products = $result['products'];
                $total = $result['total'];

                // delete the session , so if other payment by wallet happens it won't take the same session id as the near previous wallet payment that happened before
                session()->forget('session_id');


          
    
                return view('checkout-success' , ['products'=>$products , 'total'=>$total])->with('success','payment has been completed successfully'); 
    
                                                   


        }

        public function cancelWallet(Request $request){
            $session_id = $request->input('session_id');
            $orders = Order::where('session_id',$session_id)->get();

            if (!$session_id) {
                throw new NotFoundHttpException('Session ID is missing.');
            }
            if(!$orders){
                throw new NotFoundHttpException();
            }

            foreach($orders as $order){
                $order->status='canceled wallet';
                $order->save();

                $invoice = $order->invoice;
                $invoice->status = 'canceled wallet';
                $invoice->save();
            }

            return redirect()->route('logged_user_cart',auth()->user()->id)->withErrors(['fail' => 'Payment process has been canceled']);


        }
    


    }




