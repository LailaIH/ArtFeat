<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Creator;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Product;
use App\Models\User;
use App\Models\Option;
use App\Models\Support;
use App\Models\Ticket;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LandingController extends Controller
{
    public function welcome()
    {
        $sections = Section::where('is_online',1)->take(4)->get(); // get the first 5 sections
        $products = Product::where('is_online',1)->orderBy('created_at', 'desc')->take(40)->get(); // get the last 40 products
        $artists = User::where('is_artist', true)->get();
        $whyArtfeatText = Option::where('key', 'why_artfeat_text')->value('value');
        $events = Event::where('is_online',1)->take(4)->get(); // get the first 4 events
        $creators = Creator::where('is_online',1)->take(5)->get();

        return view('welcome2',['sections'=>$sections ,
        'products'=>$products,
        'artists'=>$artists,
        'whyArtfeatText'=>$whyArtfeatText,
        'events'=>$events,
        'creators'=>$creators,
    ]);
    }

    public function switch ($locale) {
        if(in_array($locale, ['ar', 'en'])){
            
           if (Auth::user()){
               $user = User::findOrFail(auth()->user()->id);
               $user->language = $locale;
               $user->save();
           }
           else{
            session()->put('locale', $locale);
           }
       
   }
        return redirect()->back(); 
   
   }

    public function discover(){

       // $artists = User::where('is_artist', true)->get();
        $artists = User::where('is_artist', true)->paginate(3);


        return view('discover',['artists'=>$artists]);

    }


    public function allSections(){
        
        return view('all-sections',['sections'=>Section::where('is_online',1)->get()]);
    }


    public function events(){
        $events = Event::where('is_online',1)->get();
        return view('landing.events',compact('events'));
    }

    public function singleEvent($id){
        $event = Event::findOrFail($id);
        return view('landing.single-event',compact('event'));
    }

    public function auctions(){
        return view('landing.auctions',['auctions'=>Auction::all()]);
    }



    public function addPriceLanding(Request $request , $id){
        $auction = Auction::findOrFail($id);
        $endPrice = $request->input('ending_price');

        if (($auction->ending_price == 0 && $endPrice > $auction->starting_price) || ($auction->ending_price!=0 && $endPrice > max($auction->ending_price , $auction->starting_price))) {  // max is for : if the admin changes start price to a number that is larger than the current ending price     
            $auction->participants()->attach(auth()->user()->id,  ['ending_price' => $endPrice]);
           
                $auction->ending_price = $endPrice;
                $auction->save();
            
        }

        else{
            return back()->withErrors(['fail'=>'enter a price that is greater than the current price']);
        }

        return redirect()->route('auctions')->with('success','price added successfully');

    }


    public function privacyPolicy(){
        return view('landing.privacy-policy');
    }


    public function support(){
        $supports = Support::where('is_online',1)->get();
        return view('landing.support',compact('supports'));
    }

    public function test(){
        return view('test', ['products' => Product::all()]);
    }
    

    // test
    // public function productsFilter(Request $request){
    //     $price = strip_tags($request->input('price'));
    //     $artist_id = strip_tags($request->input('artist_id'));
    
    //     $products = Product::when($price != null, function ($query, $price) {
    //         return $query->where('price', $price);
    //     })->when($artist_id != null, function ($query, $artist_id) {
    //         return $query->where('artist_id', $artist_id);
    //     })->get();
    
    //     return view('test', compact('products'));
    // }


    public function singleSection($id){
        $section = Section::findOrFail($id);
        return view('landing.single-section',compact('section'));
    }


    public function landingLogin(){
        return view('landing-login');
    }

    public function landingSignup(){
        return view('landing-signup');
    }


    public function userProfile(){
        $user = User::findOrFail(Auth::user()->id);
        return view('landing.userProfile',compact('user'));
    }

    public function updateUser(Request $request , $id){
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('userImages'), $imageName);
            $user->img = $imageName;
        }

        $user->save();

        return redirect()->back()->with('success','profile was updated successfully');


    }

    // show authenticated user's tickets

    public function showTickets(){
        $user = User::findOrFail(auth()->user()->id);
        $tickets = Ticket::where('user_id',$user->id)->where('parent_id',null)->where('status','open')->get();
        
        $closedTickets = Ticket::where('user_id',$user->id)->where('parent_id',null)->where('status','close')->get();
        $tab = session('tab', 'open');
        return view('landing.tickets.supportTickets',compact('user','tickets','tab','closedTickets'));

    }

    public function addTicket(Request $request){

        $request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);

        $user = User::findOrFail(auth()->user()->id);
        Ticket::create([
            'title'=>$request->input('title'),
            'body'=>$request->input('body'),
            'user_id'=> $user->id,
           
        ]);

        return redirect()->back();



    }

    public function showReplies($id)
    {
        $ticket = Ticket::findOrFail($id);
        // Load the associated replies
        $relatedTickets = Ticket::where('parent_id', $id)->get();
        return view('landing.tickets.show-replies', compact('ticket', 'relatedTickets'));
    }


    public function replyToTicket( Request $request){
        $validatedData = $request->validate([
            'body' => 'required|string',
        ]);

        $parentId = $request->input('parent_id');

        // Create a new ticket as a reply
        Ticket::create([
            'user_id' => auth()->user()->id, // Assuming you're using authentication
            'title' => 'reply', // You can customize this if needed
            'body' => $validatedData['body'],
            'parent_id' => $parentId,
        ]);

        return redirect()->back();


    }

    public function closeTicket($id){
        $ticket = Ticket::findOrFail($id);
        if($ticket){

            $relatedTickets = Ticket::where('parent_id', $id)->get();
            foreach($relatedTickets as $relatedTicket){
                $relatedTicket->status = 'close';
                $relatedTicket->save();
            }

            $ticket->status = 'close';
            $ticket->save();

           

            return redirect()->route('showTickets')->with(['tab'=>'close']);

            
        }

        else{
            throw new NotFoundHttpException();
        }
    }

}
