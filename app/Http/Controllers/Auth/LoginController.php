<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;
use App\Role;
use Hash;
use App\Option;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

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
    protected $redirectTo = '/tableau-bord';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirect($service) {
        Session::put('url', [url()->previous()]);
        return Socialite::driver ( $service )->redirect();
    }


    // protected function credentials(Request $request)
    // {
    //   if(is_numeric($request->get('email'))){
    //     return ['phone'=>$request->get('email'),'password'=>$request->get('password')];
    //   }
    //   elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
    //     return ['email' => $request->get('email'), 'password'=>$request->get('password')];
    //   }
    //   return ['username' => $request->get('email'), 'password'=>$request->get('password')];
    // }    

    protected function randomPassword() {
      $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@!&(';
      $pass = array(); //remember to declare $pass as an array
      $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
      for ($i = 0; $i <= 8; $i++) {
          $n = rand(0, $alphaLength);
          $pass[] = $alphabet[$n];
      }
      return implode($pass); //turn the array into a string
    }



}