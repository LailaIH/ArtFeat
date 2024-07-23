<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Section;
use App\Models\User;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ProductsController extends Controller
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
        $products = Product::all();
        return view('products.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::all();
        $artists = User::where('is_artist',true)->get();
        return view('products.create', ['sections'=>$sections , 'artists'=>$artists]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',            
            'section_id' => 'required|exists:sections,id', // Validate the section_id exists in the sections table
            'artist_id' => 'required',
            'img'=>'required',
       
        ]);



        $product = new Product();
        $product->user_id = auth()->user()->id;
        $product->section_id = $request->input('section_id');
        $product->artist_id = $request->input('artist_id');

       

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('productImages'); 
            if (!file_exists($destinationPath . '/' . $imageName)) {
            $image->move(public_path('productImages'), $imageName);
            }
            $product->img = $imageName;
        }
        $product->name = strip_tags($request->input('name'));
        $product->description = strip_tags($request->input('description'));
        $product->price = strip_tags($request->input('price'));
        $product->stock_quantity = strip_tags($request->input('stock_quantity'));

        if($request->input('price')<=0){
            return redirect()->back()->withErrors(['fail'=>'price can not be less than or equal to zero']);
        }


        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

 
   
    public function edit(Product $product)
    {
        $sections = Section::all();
      

        $user=$product->artist; // get the user of that artist
        $artist_id = $user->artist->id;
        
    $collections = Collection::where('artist_id',$artist_id)->where('is_online',1)->get(); // get the online collections of the product owner artist
        return view('products.edit',['product'=>$product , 'sections'=>$sections,
        'collections'=>$collections,
        
    ]);
    }


    // update produt that doesn't have a collection id yet or has an online collection id
    public function updateCollectionIdProduct(Request $request, Product $product){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',            
            'section_id' => 'required|exists:sections,id', // Validate the section_id exists in the sections table
        ]);

        $product->section_id = $request->input('section_id');
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('productImages'); 
            if (!file_exists($destinationPath . '/' . $imageName)) {
            $image->move(public_path('productImages'), $imageName);
            }
            $product->img = $imageName;
        }
        $product->name = strip_tags($request->input('name'));
        $product->description = strip_tags($request->input('description'));
        $product->price = strip_tags($request->input('price'));
        $product->stock_quantity = strip_tags($request->input('stock_quantity'));

        if($request->input('price')<=0){
            return redirect()->back()->withErrors(['fail'=>'price can not be less than or equal to zero']);
        }

        $product->is_online = $request->has('is_online')?1:0;
        $product->best_seller = $request->has('best_seller')?1:0;


        if($request->filled('collection_id')){
            $product->collection_id = $request->input('collection_id');
            }


        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');


    }

    // view for offline products with no collection id yet or with collection that is online
    public function showOfflineProduct(Product $product){

        return view('products.show-offline-product',['product'=>$product]);
    }

    // update is online for the showOfflineProduct function (only update is online )
    public function updateIsOnlineProduct(Request $request , Product $product){
        $product->is_online = $request->has('is_online')?1:0;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');

    }



    // show product that has a collection id but the collection is offline , so the product won't have is_online checkbox option
    public function showOfflineCollectionIdProduct(Product $product){
     
        return view ('products.show-offline-collection-product',['product'=>$product]);
      
}
}