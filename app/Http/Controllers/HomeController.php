<?php

namespace App\Http\Controllers;

use App\Models\JobTitle;
use App\Models\User;
use App\Models\Artist;
use App\Models\Product;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }



    public function create(){
        $jobTitles = JobTitle::all();
        return view('users.create',['jobTitles'=>$jobTitles]);
    }

    public function store(Request $request){

        $user = new User();

        $request->validate([
            'name'=>'required',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string',
            
        ]);

        $user->name = strip_tags($request->input('name'));
        $user->password = bcrypt($request->input('password'));
        $user->email = strip_tags($request->input('email'));
        $user->job_title_id = strip_tags($request->input('job_title_id'));
        $user->is_ban = $request->has('is_ban') ? 1:0 ;
        $user->is_dealer = $request->has('is_dealer') ? 1:0 ;
        $user->is_artist = $request->has('is_artist') ? 1:0 ;
        $user->points = strip_tags(intval($request->input('points')));

        $user->save();

        if($user->is_artist){
           $artist = new Artist();
           $artist->user_id = $user->id;
           $artist->name = $user->name;
           $artist->save(); 
        return redirect()->route('users.artists')->with('success', 'Artist Created successfully.');
        }
        else{
            return redirect()->route('users.nonArtists')->with('success', 'User Created successfully.'); 
        }
    }

    //Artists

    public function showArtists()
    {
        $artists = User::where('is_artist', 1)->get();
        //return $artists;
        return view('users.artists.index')->with('artists', $artists);
    }

    public function editArtists($id){
        $jobTitles = JobTitle::all();
        
        return view('users.artists.edit',['artist'=>User::findOrFail($id) , 'jobTitles'=>$jobTitles]);

    
    }

    public function updateArtists(Request $request , $id){

        $artistUser = User::findOrFail($id);
        $request->validate([
            'name'=>'required',
       ] );

       if ($request->hasFile('img')) {
        $image = $request->file('img');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('userImages'), $imageName);
        $artistUser->img = $imageName;
    }

       $artistUser->name = strip_tags($request->input('name'));
       $artistUser->job_title_id = strip_tags($request->input('job_title_id'));

       $artistUser->is_ban = $request->has('is_ban') ? 1:0 ;
       $artistUser->is_dealer = $request->has('is_dealer') ? 1:0 ;
       $artistUser->points = strip_tags(intval($request->input('points')));

       $artistUser->save();


        if($id == auth()->user()->id){
            return redirect()->route('users.profile',$id)->with('success','profile has been successfully updated'); 
        }
    

       return redirect()->route('users.artists')->with('success', 'User updated successfully.') ;






    }



    //Non Artists

    public function showNonArtists()
    {
        $nonArtists = User::where('is_artist', 0)->get();
        return view('users.non-artists.index')->with('nonArtists', $nonArtists);
    }


    public function editNonArtists($id){
        $jobTitles = JobTitle::all();
        
        return view('users.non-artists.edit',['nonArtist'=>User::findOrFail($id) , 'jobTitles'=>$jobTitles]);

    
    }

    public function updateNonArtists(Request $request , $id){
        $nonArtistUser = User::findOrFail($id);
        $request->validate([
            'name'=>'required',
            
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('userImages'), $imageName);
            $nonArtistUser->img = $imageName;
        }

        $nonArtistUser->name = strip_tags($request->input('name'));
        $nonArtistUser->job_title_id = strip_tags($request->input('job_title_id'));
        $nonArtistUser->is_ban = $request->has('is_ban') ? 1:0 ;
        $nonArtistUser->is_dealer = $request->has('is_dealer') ? 1:0 ;
        $nonArtistUser->is_artist = $request->has('is_artist') ? 1:0 ;
        $nonArtistUser->points = strip_tags(intval($request->input('points')));

        $nonArtistUser->save();

        if($nonArtistUser->is_artist){
            $artist = new Artist();
            $artist->user_id = $nonArtistUser->id;
            $artist->name = $nonArtistUser->name;
            $artist->save();
        } 

        if($nonArtistUser->id == auth()->user()->id){
            return redirect()->route('users.profile',$id)->with('success','profile has been successfully updated'); 
        }

        else{
            if($nonArtistUser->is_artist){
                return redirect()->route('users.artists')->with('success', 'User Updated successfully.');; ;

            }
            else{
                return redirect()->route('users.nonArtists')->with('success', 'User Updated successfully.');; ;

            }
        }





    }



    public function profile($id){

        $user = User::findOrFail($id);
        $jobs = JobTitle::all();

        return view('users.profile',['user'=>$user , 'jobs'=>$jobs]);

    }










    public function deleteArtist($id){
        $user = User::findOrFail($id);
        $artist = $user->artist;
        $products = Product::where('artist_id',$user->id)->get();
        $collections = $artist->collections;
        User::destroy($id);
        Artist::destroy($artist->id);
        
       
            return redirect()->route('users.artists')->withErrors(['fail' => 'Artist and all of their products , collections have been deleted']);
          
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);
         User::destroy($id);
       
            return redirect()->route('users.nonArtists')->withErrors(['fail' => 'User has been deleted']);
          
    }








}

