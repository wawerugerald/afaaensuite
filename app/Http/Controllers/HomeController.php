<?php

namespace App\Http\Controllers;

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

       {
        return view('home');
       }
      // if (Auth::user()->roles == '1')
      // {
      //     return redirect('dashboard');
      // }
      // elseif (Auth::user()->roles == '2')
      // {
      //     return'publisher';
      // }
      // elseif (Auth::user()->roles == '3')
      // {

      //     return redirect('frontend/contributorprofilecreate');
          
      // }
      // elseif (Auth::user()->roles == '4')
      // {
      //     return 'reviewer';
      // }
      // elseif (Auth::user()->roles == '0')
      // {
      //     return 'reviewer/publisher';
      // }
      // else  {

      //   return view('home');
      // }
  }
}
