<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function __construct()
     {
         $this->middleware('auth');
     }

     public function index(){
        $notifications = Notification::all();
        return view('notifications.index',compact('notifications'));
     }

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
        return redirect()->route('notifications.index')->with('success','request was approved');
     }


     public function reject($id){
        $notification = Notification::findOrFail($id);

        $notification->status = 'rejected';
        $notification->save();

        return redirect()->route('notifications.index')->withErrors(['fail'=>'request was rejected']);


     }
}
