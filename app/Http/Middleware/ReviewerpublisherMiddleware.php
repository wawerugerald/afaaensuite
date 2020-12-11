<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ReviewerpublisherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
     {    //the role value ==3 is defined on the users table under roles
        if(Auth::user()->roles =='0'){

            return $next($request);
        }else{
            return redirect('/login');
        }        
    }
}
