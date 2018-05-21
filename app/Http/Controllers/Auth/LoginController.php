<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    // {{ route('name.route', ['id' => $val->id]) }}

    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function login(Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember) && Auth::attempt(['status' => '0'], $request->remember)){
            return redirect()->intended(route('dashboard'));
        }else{
            return back()->with('userError','These credentials do not match our records');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except(['userLogout','logout']);
    }

    public function userLogout(){
        Auth::guard('web')->logout();
        return redirect('/login');
    }
}
