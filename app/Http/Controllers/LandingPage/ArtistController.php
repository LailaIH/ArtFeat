<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Product;
use App\Models\Collection;
use App\Models\Cart;
use App\Models\User;
use App\Models\Artist;
use App\Models\ArtworkProvided;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LandingPage\Countries;
use App\Models\Auction;
use App\Models\Notification;

class ArtistController extends Controller
{

    

    public function signup(){

        $countriesInstance = new Countries();

        $countries = $countriesInstance->countries();
        $cities = $countriesInstance->cities();
        return view('artists.artist-signup' , ['countries'=>$countries , 'cities'=>$cities]);
    }

    public function create(Request $request){
        $request->validate([

            'name'=>'required|string|unique:artists|max:255',
            'email'=>'required|string|email|unique:users|max:255',
            'password'=>'required|string|min:8|confirmed',
            'store'=>'required|string',
            'country'=>'required',
            'city'=>'required',

        ]);

        $user = new User();
        $user->name = strip_tags($request->input('name'));
        $user->email = strip_tags($request->input('email'));
        $user->password = Hash::make($request->input('password'));
        $user->is_artist = 1;
        $user->save();

        $artist = new Artist();
        $artist->user_id = $user->id;
        $artist->name = strip_tags($request->input('name'));
        $artist->store_name = strip_tags($request->input('store'));
        $artist->country = strip_tags($request->input('country'));
        $artist->city = strip_tags($request->input('city'));
        if($request->input('registered')=='yes'){
            $artist->is_registered = 1;
        }
        else {
            $artist->is_registered = 0;
        }
        $artist->save();
        Auth::login($user);


        $result = session('url.intended');
        // Check if there's a previous URL in the session indicating payment attempt
        if ($result && $result==1) {
            // $urlIntended = $request->session()->pull('url.intended');

            // Redirect to specific route for cart details with user ID
            return redirect()->route('logged_user_cart',$user->id);
        }

        return redirect()->route('welcome');

    }

    public function profile($id){
        $user = User::findOrFail($id);
        $artist = Artist::where('user_id',$user->id)->first();
        if(!$artist){
            $artist = new Artist();
            $artist->name = $user->name ;
            $artist->user_id = $user->id;
            $artist->save();
            $user->is_artist = 1;
            $user->save();
        }

        $collections = Collection::where('artist_id',$artist->id)->where('is_online',1)->get();
        $carts = Cart::where('user_id',$user->id)->where('is_online',1)->get();

        $products = Product::where('artist_id', $user->id)
        ->where('is_online',1)->get();

        $tab = session('tab', 'artwork');

        return view('artists.profile',['artist'=>$artist , 'user'=>$user ,
         'collections'=>$collections,
        'carts'=>$carts,
         'products'=>$products,
        'tab'=>$tab]);
    }

    public function updateProfilePicture(Request $request ,$id){
        $user = User::findOrFail($id);

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('userImages'), $imageName);
            $user->img = $imageName;
            $user->save();
            return back()->with('success','profile picture updated successfully');
        }

        return back();

    }


    public function updateBackgroundPicture(Request $request ,$id){
        $user = User::findOrFail($id);
        $artist = Artist::where('user_id',$user->id)->first();

        if ($request->hasFile('background')) {
            $image = $request->file('background');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('backgroundImages'), $imageName);
            $artist->background = $imageName;
            $artist->save();
            return back()->with('success','Background picture updated successfully');
        }

        return back();

    }


    public function editProfile($id){
        $user = User::findOrFail($id);
        $artist = Artist::where('user_id',$user->id)->first();
        if(!$artist){
            $artist = new Artist();
            $artist->name = $user->name ;
            $artist->user_id = $user->id;
            $artist->save();
            $user->is_artist = 1;
            $user->save();
        }
        return view('artists.edit-profile',['artist'=>$artist , 'user'=>$user,'artworksProvided'=>ArtworkProvided::all()]);

    }

    public function update(Request $request , $id){
        $user = User::findOrFail($id);
        $artist = Artist::where('user_id',$user->id)->first();

        $request->validate([
            'name'=>'required',
            

        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('userImages'), $imageName);
            $user->img = $imageName;
            
        }
        
        $user->name = strip_tags($request->input('name'));
        $user->save();


        $artist->name = strip_tags($request->input('name'));
        $artist->store_name = strip_tags($request->input('store_name'));
        $artist->country = strip_tags($request->input('country'));
        $artist->city = strip_tags($request->input('city'));
        $artist->language = strip_tags($request->input('language'));
        $artist->facebook = strip_tags($request->input('facebook'));
        $artist->instagram = strip_tags($request->input('instagram'));
        $artist->tiktok = strip_tags($request->input('tiktok'));
        $artist->twitter = strip_tags($request->input('twitter'));
        $artist->website = strip_tags($request->input('website'));
        $artist->behance = strip_tags($request->input('behance'));
        $artist->artwork_provided_id = $request->input('artwork_provided_id');


        $artist->save();

        return redirect()->route('artists.profile',$id)->with('success','profile updated successufully');




    }

    // add a new collection
    public function showAddCollection(){
        return view('artists.add-collection');

    }

    public function addCollection(Request $request ,$id){
       $request->validate([
       'name'=>'required',
       
       ]);
        $user = User::findOrFail($id);
        $artist = $user->artist;

        $collection = new Collection();
        $collection->name= strip_tags($request->input('name'));
        $collection->artist_id = $artist->id;
        $collection->save();
        return redirect()->route('artists.profile',$id)->with(['success','collection created successufully','tab'=>'collections']);


    }

    //show add art to a collection
    public function showAddToCollection($id){
        $collection = Collection::findOrFail($id);
        $products = $collection->products;
        return view('artists.add-to-collection',['collection'=>$collection,
        'products'=>$products
         , 'sections'=>Section::where('is_online',1)->get()]);

    }

    // add art to a certain collection

    public function addArtToCollection(Request $request , $id){
        $request->validate([
            'name'=>'required',
            'type'=>'required',
            'date'=>'required|date',
            'dimensions'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'img'=>'required',
        ]);
        $collection = Collection::findOrFail($id);

        $product = new Product();
        $product->artist_id = auth()->user()->id;
        $product->name = strip_tags($request->input('name'));
        $product->description = strip_tags($request->input('description'));

        $product->artwork_type = strip_tags($request->input('type'));
        $product->collection_id = $collection->id;
        if($request->input('created')=='yes'){
            $product->is_created_by_artist = 1;
        }
        else {
            $product->is_created_by_artist = 0;
        }
        $product->creation_date = $request->input('date');
        $product->artwork_dimensions = strip_tags($request->input('dimensions'));
        $product->price = strip_tags($request->input('price'));

        if($request->input('price')<=0){
            return redirect()->back()->withErrors(['fail'=>'price can not be less than or equal to zero']);
        }

        if($request->has('discount_price')){
            $product->price_after_discount =$request->input('discount_price');
        }

        $product->stock_quantity = strip_tags($request->input('quantity'));
        $product->product_visibility = $request->has('visibility')?1:0;

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('productImages'), $imageName);
            $product->img = $imageName;
        }


       

        if ($request->hasFile('digital_works')) {
            $documents = $request->file('documents');
            $documentsName =   $documents->getClientOriginalName();
            $documents->move(public_path('digital_works'), $documentsName);
            $product->digital_work_file = $documentsName;
        }

        

        
        $product->user_id = auth()->user()->id;
        $product->section_id = $request->input('section_id');
        
        $product->save();
        $message ='artwork added successfully';

        if($request->has('auction')){
            
            $auction = new Auction();
            $auction->product_id = $product->id;
            $auction->user_id = auth()->user()->id;
            $auction->title = $product->name;
            $auction->starting_price = $product->price;
            $auction->start_time = $request->filled('start_time') ? $request->input('start_time') : Carbon::now()->toDateTimeString();
            $auction->end_time = $request->filled('end_time') ? $request->input('end_time') : Carbon::now()->addMonth()->toDateTimeString();
            $auction->save();
           
            $extraText = ' it now belongs to auctions ' ;
            $message .= $extraText;

        }
        return redirect()->route('artists.profile',auth()->user()->id)->with(['success'=>$message ,'tab'=>'collections']);
      

        


    }

   

    public function disableCollection(Collection $collection){

        $collection->is_online=0;
        $collection->save();

        $products = $collection->products;
        foreach($products as $product){
            $product->is_online = 0;
            $product->save();
        }

        return redirect()->back()->with(['fail' => 'Collection was removed','tab'=>'collections']);
        

    }

    // edit collection name
    public function updateCollection(Request $request , $id){
        $collection = Collection::findOrFail($id);
        $collection->name = $request->input('name');
        $collection->save();
        return redirect()->back()->with(['success'=>'collection name has been updated successfully','tab'=>'collections']);
    }

    // About Artist Section
    public function addExpert(Request $request ,$id){
       
        $artist = Artist::findOrFail($id);
        $newExpertise = $request->input('expertise');

        // Append new expertise to the existing array if it exists
        if (isset($artist->expertise)) {
            $artist->expertise = array_merge($artist->expertise, $newExpertise);
        } else {
            $artist->expertise = $newExpertise; // Set expertise if it doesn't exist
        }
        $artist->save();
    
        return redirect()->back()->with(['success'=> 'Expertise added successfully','tab'=>'about']);
    }

    public function addDescription(Request $request , $id){
        $artist = Artist::findOrFail($id);
        $message = 'Description ';
        if ($artist->description) {
            $message .= 'updated';
        } else {
            $message .= 'added';
        }
        $artist->description = $request->input('description');
        $artist->save();
        return redirect()->back()->with(['success'=> $message.' successfully','tab'=>'about']);

    }

    public function addYears(Request $request , $id){
        $artist = Artist::findOrFail($id);
        $message = 'Years of experience ';
        if ($artist->years_of_experience) {
            $message .= 'updated';
        } else {
            $message .= 'added';
        }
        $artist->years_of_experience = $request->input('years');
        $artist->save();
        return redirect()->back()->with(['success'=> $message.' successfully','tab'=>'about']);

    }

    // show become an artist form
    // public function showBecomArtist(){
    //     $countriesInstance = new Countries();

    //     $countries = $countriesInstance->countries();
    //     $cities = $countriesInstance->cities();
    //     return view('artists.become-artist' , ['countries'=>$countries , 'cities'=>$cities]);
    // }

    // convert logged in user to an artist
    public function becomeArtist(Request $request){

        $notification = new Notification();
        $notification->user_id = auth()->user()->id;
        $notification->type = 'become artist';
        $notification->save();

        return redirect()->back()->with('success','a request was sent to admin , waiting for admin\'s approval');
    
    }

    // show a profile of another artist
    public function showArtist($id){
        $user = User::findOrFail($id);
        $artist = Artist::where('user_id',$user->id)->first();
        $products = Product::where('artist_id', $user->id)
        ->where('is_online',1)->get();
        $collections = Collection::where('artist_id',$artist->id)->where('is_online',1)->get();
        return view('artists.artist',compact('products','artist','user','collections'));


    }

    public function editArtWork($id){
        $product = Product::findOrFail($id);
        $sections = Section::where('is_online',1)->get();
        return view('artists.ediArtWork',compact('product','sections'));

    }

    public function updateArtWork(Request $request ,$id){
        $product = Product::findOrFail($id);
        $product->creation_date= $request->input('creation_date');
        $product->artwork_type = $request->input('artwork_type');
        $product->price_after_discount = $request->input('price_after_discount');
        $product->stock_quantity = $request->input('stock_quantity');
        $product->price_after_discount = $request->input('price_after_discount');
        $product->artwork_dimensions = $request->input('artwork_dimensions');
        $product->section_id = $request->input('section_id');


        $product->save();

        $data= $request->validate([
            'name'=>'required',
            'price' => 'required|numeric|min:1',
        ]);
        $additional = [
            
            'description'=>$request->input('description'),



        ];

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = $image->getClientOriginalName();
            $destinationPath = public_path('productImages');
            if (!file_exists($destinationPath . '/' . $imageName)) {
            $image->move(public_path('productImages'), $imageName);
            }
            $additional['img'] = $imageName;

            
           
            
        }

        if ($request->hasFile('digital_works')) {
            $documents = $request->file('documents');
            $documentsName =   $documents->getClientOriginalName();
            if(!file_exists(public_path('digital_works/'.$documentsName))){
            $documents->move(public_path('digital_works'), $documentsName);
            }
            $additional['digital_work_file'] = $documentsName;
        }

        $final = array_merge($data,$additional);

        $product->update($final);
        return redirect()->route('artists.profile',auth()->user()->id)->with('success','art work was updated successfully');


    }

    // if an artwork doesn't belong to some collection , it adds it to one
    public function addExistedArtworkToCollection(Request $request,$productId){
        $product = Product::findOrFail($productId);
        $product->collection_id = $request->input('collection');
        $product->save();
        return redirect()->back()->with(['success'=> 'artwork was added to the collection successfully','tab'=>'collections']);



    }


}