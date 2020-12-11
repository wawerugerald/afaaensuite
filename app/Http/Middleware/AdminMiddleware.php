<?php


// namespace App\Http\Middleware;

// use Closure;
// use Auth;

// class AdminMiddleware
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure  $next
//      * @return mixed
//      */
//     public function handle($request, Closure $next)
//     {    //the role value ==1 is defined on the users table under roles
//        if (Auth::check()) {
            
//             $user = Auth::user();
//             if($user->roles == 1 || $user->roles == 0 || $user->roles == 2|| $user->roles ==3||
//                 $user->roles == 4){
//                 return $next($request);
//             }
//         }
//              return redirect('/');
//     }
        
// }


namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {    //the role value ==1 is defined on the users table under roles
        if(Auth::user()->roles =='1'){

            return $next($request);
        }else{
            return redirect('/home');
        }        
    }
}
