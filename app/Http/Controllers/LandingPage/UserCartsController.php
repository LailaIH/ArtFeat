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

    //update non logged user cart session
    public function updateNonLoggedUserCart(Request $request , $productId){
        $cart = session()->get('cart');
        if($cart){
            if ($request->input('action') == 'plus'){
                $cart[$productId]['quantity']++ ;
            }
            elseif($request->input('action') == 'minus' && $cart[$productId]['quantity'] >1 ){
                $cart[$productId]['quantity']--;
            }

            session()->put('cart', $cart);
           
            
            return redirect()->back()->with('success','cart has been updated successfully');

        }
    }

    //remove from non logged user session
    public function removeFromCart($productId){

        $cart = session()->get('cart');
        if(isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);



            return redirect()->back()->withErrors(['fail' => 'Cart has been deleted']);

    }
}


    //migrate non logged user to database
    public function migrateCartToDatabase($user) {
        $cart = session('cart', []);
    
        foreach ($cart as $productId => $item) {
            $cartItem = new Cart();
            $cartItem->user_id = $user;
            $cartItem->product_id = $productId;
            $cartItem->quantity = $item['quantity'];
            $cartItem->max_products = 0;
            $cartItem->save();
        }
    
        // Clear cart from session
        session()->forget('cart');
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

    $cart = Cart::findOrFail($id);

    if ($request->input('action') == 'plus') {
     $cart->quantity++;
    }
    elseif ($request->input('action') == 'minus'){
        if($cart->quantity > 1){
        $cart->quantity--;
    }
}
    
    
    $cart->save();
    return redirect()->back()->with('success','cart has been updated successfully');



 
 }


 public function deleteLoggedUserCart($id){

    Cart::destroy($id);
    return redirect()->back()->withErrors(['fail' => 'Cart has been Deleted']);

 }







}