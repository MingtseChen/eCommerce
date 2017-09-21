<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Auth;
use View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
	protected $redirectTo = 'admin/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm(){
	     return view('auth.login');
    }
    public function login(Request $request){
	    $this->validate($request,[
		    'email' => 'required|string|email|max:255',
		    'password' => 'required|string',
	    ]);
		$authData = $request->only(['email','password']);
		if(Auth::attempt($authData,$request->has('remember'))) {
			return Redirect::route('user.index');
		}else{
			return Redirect::route('login')->withErrors(['msg'=>'username or password error']);
		}
    }
    public function logout(){
    	Auth::logout();
    	return Redirect::action('HomeController@index');
    }
	/*public function authenticate()
	{
		//$email = User::select('user');
		//$password = User::select('password');
		if (Auth::attempt(['email' => User::select('email')->get(), 'password' => 'ssss'])) {
			// Authentication passed...
			return redirect()->intended('dashboard');
		}
	}*/
}
