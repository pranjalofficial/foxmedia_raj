<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/';
    protected function redirectTo(){
        if(auth()->user()->role=='Client')
            return '/dashboard/clients/'.auth()->user()->id;
        if(auth()->user()->role=='Agency')
            return '/dashboard/agencies/'.auth()->user()->id;
        if(auth()->user()->role=='Admin')
            return '/dashboard/admin/'.auth()->user()->id;
        if(auth()->user()->role=='Account Manager')
            return '/dashboard/account_manager/'.auth()->user()->id;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
}
