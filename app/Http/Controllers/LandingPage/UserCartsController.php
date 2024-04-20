<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Pagination\Paginator;



class UserCartsController extends Controller
{

    //show cart details for non logged users
    public function nonLoggedUserCart(){
        $itemTotal=0;
        $total = 0 ;
        if(session()->get('cart')){
        foreach(session('cart') as $cart =>$value){
            $itemTotal = $value['quantity']*$value['product']['price'];
            $total += $itemTotal;
        }
    }
        return view('cart-detail',['total'=>$total]);
    }

    // add cart for non logged in user
    public function nonLoggedUserAddToCart($id){
        $product = Product::findOrFail($id);

        $quantity = 1;
        

        $cart = session('cart',[]);

        if(array_key_exists($id,$cart)){
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        }
        else{
            $productArray = ['product' =>$product ,'quantity' => $quantity];
            $cart[$id] = $productArray ;
            session()->put('cart', $cart);
        }
        return redirect()->route('non_logged_cart');




    }

    //show cart of logged user
    public function loggedUserCart($id){

        $user = User::findOrFail($id);
        $carts = $user->carts ;
        $total =0;

        foreach($carts as $cart){
            $total += $cart['quantity'] * $cart->product->price;
        }
        return view('cart-details-user',['carts'=>$carts , 'total'=>$total]);
    }

    // add to cart for logged user
    public function loggedUserAddToCart($id){
        $cart = Cart::where('product_id', $id)
                    ->where('user_id' , auth()->user()->id)->first(); 

        if($cart){
            $cart->quantity++ ;
            $cart->save();
            
        }
        else{
        
        $cart = new Cart();
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $id;
        $cart->max_products = 0;
        $cart->quantity = 1;
        

        $cart->save();
        }

        return redirect()->route('logged_user_cart',auth()->user()->id);




    }

 // update user cart
 public function updateLoggedUserCart(Request $request , $id){

    
    $total = $request->input('subtotal');
    $quantity = intval($request->input('quantity'));

    $cart = Cart::findOrFail($id);
    $user = $cart->user;
    $cart->quantity = $quantity;
    $cart->save();

    $subtotal = $quantity*$cart->product->price;
    $total = 0;
    foreach($user->carts as $cart){
        $total += $cart['quantity'] * $cart->product->price;
    }

    return response()->json([
        'quantity' => $quantity,
        'subtotal' => $subtotal,
        'total' => $total,
    ]);

 
 }







}