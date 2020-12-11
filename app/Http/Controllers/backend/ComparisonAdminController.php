<?php

namespace App\Http\Controllers\backend;

use App\ComparisonAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ComparisonAdminController extends Controller
{
   
  public function comparisonadminreg()
  {
    $comparisonadmin = ComparisonAdmin::all();
    return view ('backend.comparisonadmin.comparisonadminreg')->with('comparisonadmin',$comparisonadmin);
  }
  public function comparisonadminadd()
  {
    $comparisonadmin = ComparisonAdmin::all();
    return view ('backend.comparisonadmin.comparisonadmincreate')->with('comparisonadmin',$comparisonadmin);
  }
  public function comparisonadminstore(Request $request)
  {
    $comparisonadmin = New ComparisonAdmin();
    $comparisonadmin->name = $request->input('name');
    $comparisonadmin->fullname = $request->input('fullname');    
    $comparisonadmin->text = $request->input('info');
    $comparisonadmin->save();

    return redirect('/comparisonadmin-reg')->with('status','New Comparison Text Created ');
  }
  public function comparisonadminedit(Request $request,$id)
  {
    $comparisonadmin = ComparisonAdmin::where('ID','=', $id)->first();
    return view('backend.comparisonadmin.comparisonadminedit')->with('comparisonadmin',$comparisonadmin); 
  }
  public function comparisonadminupdate(Request $request,$id)
  {
    $comparisonadmin = ComparisonAdmin::where('ID','=', $id)->update([
    "name" => $request->input('name'),
    "fullname" => $request->input('fullname'),
    "text" => $request->input('info'),
      ]); 
    return redirect('/comparisonadmin-reg')->with('status','Comparison Text Data Updated');     
  }  
}
