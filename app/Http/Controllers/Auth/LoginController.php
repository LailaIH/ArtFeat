<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        $result = session('url.intended');
        // Check if there's a previous URL in the session indicating payment attempt
        if ($result && $result==1) {
            // $urlIntended = $request->session()->pull('url.intended');

            // Redirect to specific route for cart details with user ID
            return redirect()->route('logged_user_cart',$user->id);
        }

        // Otherwise, redirect to default location
        return redirect()->intended($this->redirectPath());
    }
}
