<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CartsController extends Controller
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
        // Get the user IDs from the carts table
        $userIdsWithCarts = DB::table('carts')->distinct()->pluck('user_id');
       // Fetch users who have carts
       $usersWithCarts = User::whereIn('id', $userIdsWithCarts)->get();        

       return view('carts.index', ['carts'=>Cart::all(), 'usersWithCarts'=>$usersWithCarts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $products = Product::all();
        return view('carts.create' , ['users'=>$users , 'products'=>$products]);
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
            'quantity' => 'required|integer',
            'max_products' => 'required|integer',            
            'user_id' => 'required|exists:users,id', // Validate the section_id exists in the sections table
            'product_id' => 'required|exists:products,id',
        ]);
        $user = User::findOrFail($request->input('user_id'));

        $cart = Cart::where('product_id', $request->input('product_id'))
        ->where('user_id' , $request->input('user_id'))->first(); 

            if($cart){
            $cart->quantity = $cart->quantity + $request->input('quantity');
            $cart->save();

            }

            else{
        $cart = new Cart();
        $cart->user_id = $request->input('user_id');
        $cart->product_id = $request->input('product_id');
        $cart->quantity = strip_tags($request->input('quantity'));
        $cart->max_products = strip_tags($request->input('max_products'));
        $cart->save();
            }
        return redirect()->route('carts.show',$user)->with('success', 'Cart Created successfully.');; ;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $carts = $user->carts ;

        return view('carts.show',['carts'=>$carts ,'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cart = Cart::findOrFail($id);
        $users = User::all();
        $products = Product::all();
        return view('carts.edit' , ['cart'=>$cart,'users'=>$users , 'products'=>$products]);
        
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
            'quantity' => 'required|integer',
            'max_products' => 'required|integer',            
            'user_id' => 'required|exists:users,id', // Validate the section_id exists in the sections table
            'product_id' => 'required|exists:products,id',
        ]);

        $user = User::findOrFail($request->input('user_id'));


     
        $cart = Cart::findOrFail($id);
        $cart->user_id = $request->input('user_id');
        $cart->product_id = $request->input('product_id');
        $cart->quantity = strip_tags($request->input('quantity'));
        $cart->max_products = strip_tags($request->input('max_products'));
        $cart->save();
        
        return redirect()->route('carts.show',$user)->with('success', 'Cart Updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $user = $cart->user;
        Cart::destroy($id);
        return redirect()->route('carts.show',$user)->withErrors(['fail' => 'Cart has been deleted']);
    }
}
