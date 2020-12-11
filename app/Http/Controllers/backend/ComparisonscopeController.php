<?php

namespace App\Http\Controllers\backend;
use App\Comparisonscope;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class ComparisonscopeController extends Controller
{
    public function regcomparisonscope()   {


        $scopes = Comparisonscope::all(); 
        return view ('backend.scopes.comparisonscopesreg')->with('scopes',$scopes);
    }   

}
