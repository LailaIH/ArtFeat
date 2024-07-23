<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Auction;
use App\Models\Notification;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function __construct()
     {
         $this->middleware('auth');
     }

     // retrieve all notifications of type become artist
     public function becomeArtistNotifications(){
        $notifications = Notification::where('type','become artist')->get();
        return view('notifications.becomeArtist',compact('notifications'));
     }

     // approve become an artist req
     public function approve($id){
        $notification = Notification::findOrFail($id);
       
        if($notification->type==='become artist'){
            $user = User::findOrFail($notification->user_id);
            $user->is_artist = 1;
            $user->save();

            $artist = new Artist();
            $artist->user_id = $user->id;
            $artist->name = $user->name;
            $artist->save();

            
        }

        $notification->status = 'approved';
        $notification->save();
        return redirect()->route('notifications.becomeArtist')->with('success','request was approved');
     }


     // reject become an artist req
     public function reject($id){
        $notification = Notification::findOrFail($id);

        $notification->status = 'rejected';
        $notification->save();

        return redirect()->route('notifications.becomeArtist')->withErrors(['fail'=>'request was rejected']);


     }


      // retrieve all notifications of type add artwork to auctions
       public function AddToAuctionsNotifications(){
            $notifications = Notification::where('type','add artwork to auctions')->get();
            return view('notifications.addToAuctions',compact('notifications'));
         }


      // admin approval for artwork to be included in auctions
      public function approveAuction($productId , $notificationId){
      $product = Product::findOrFail($productId);
      $notification = Notification::findOrFail($notificationId);

      $auction = new Auction();
      $auction->product_id = $product->id;
      $auction->user_id = auth()->user()->id;
      $auction->title = $product->name;
      $auction->starting_price = $product->price;
      $auction->save();

      $notification->status = 'approved';
      $notification->save();
      return redirect()->route('notifications.addToAuctions')->with('success','request was approved');


  }

      public function rejectAuction($notificationId){
         $notification = Notification::findOrFail($notificationId);

         $notification->status = 'rejected';
         $notification->save();
 
         return redirect()->route('notifications.addToAuctions')->withErrors(['fail'=>'request was rejected']);
 
         
      }
}
