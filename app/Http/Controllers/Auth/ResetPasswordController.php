<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\PasswordReset;
use App\User;
use Auth;
use DB;
use Validator;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;




    protected function redirectTo(){
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
            return 'contributor';
        }
        elseif (Auth::user()->roles == '4')
        {
            return 'reviewer';
        }
        elseif (Auth::user()->roles == '0')
        {
            return 'reviewer/publisher';
        }
        else  {

            return '/home';
            
         } 

    }



    public function showResetForm(Request $request, $token = null)
    {
       
       $email = PasswordReset::where('token','=',$token)->first();

        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $email->email]
        );
    }


    protected function reset( Request $request)
    {

    
      $validator = Validator::make($request->except('_token'), [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',

        ]);

    if ($validator->fails()) {
        $errors = $validator->errors();
        return Redirect::back()->withInput()->withErrors($errors);
      }else{

        $user= DB::table('users')
          ->where('email', $request->input('email'))
          ->update([
            'password' => Hash::make($request->input('password'))

        ]);

          PasswordReset::where('token',$request->input('token'))->where('email',$request->input('email'))->delete();

        return redirect('/login');
       
      }

    }
}
