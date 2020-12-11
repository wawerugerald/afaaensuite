<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



use Auth;

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
    // protected $redirectTo = RouteServiceProvider::HOME;


    //hapa ndio tuna control kenye admin ata output...
  // protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
   { 
       if (Auth::user()->roles == '1')
      {
          return 'dashboard';
      }
      elseif (Auth::user()->roles == '2')
      {
          return'publisher';
      }
      elseif (Auth::user()->roles == '3')
      {   
        if(!empty(Auth::user()->completedprofile == '1'))
        {
          return 'contributor-home';
        }
        else
        {
           return 'contributor';   
        }                
      }
      elseif (Auth::user()->roles == '4')
      {
          return 'reviewer';
      }
      elseif (Auth::user()->roles == '0')
      {
          if (!empty(Auth::user()->completedprofile == '1')) {
            return 'reviewerpublisher-home';
          }
          else
          {
            return 'reviewerpublisher';
          }
      }
      else  
      {
        return view('home');
      }
   }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
