<?php

use Illuminate\Http\Request;
//use DB;


namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Acts;

class MasteractsController extends Controller
{
     public function registered(){
        $acts = Acts::all();
        return view('backend.masteracts.tablemasteracts')->with('acts',$acts);
    }
     public function actsadd()
    {
        $acts = Acts::all();

        return view('backend.masteracts.masteractscreate')->with('acts',$acts);
    }
     public function actsstore(Request $request)
        {
        
        $acts = new Acts();
        $acts->title = $request->input('title');
        $acts->titletext = $request->input('titletext');
        $acts->enactmentdate = $request->input('date'); 
        $acts->type = $request->input('type');           
        $acts->save();

        return redirect('/acts-reg')->with('status','New Master Act Created ');       

    } 
   public function actsedit(Request $request, $id)
    {
        $acts = Acts::where('actsid','=', $id)->first();
        return view('backend.masteracts.masteractsedit')->with('acts',$acts);

    }

    public function actsupdate(Request $request,$id)
    {
        $acts = Acts::where('actsid','=', $id)->update([
        "title" => $request->input('title'),
        "titletext"=> $request->input('titletext'),
        "enactmentdate" => $request->input('date'),   
        "type"=> $request->input('type'),       
        ]);         
      

        return redirect('/acts-reg')->with('status','Master Act Data Updated');
    } 

    public function actsdelete(Request $request, $id)
    {
        $acts = Acts::findOrFail($id);
        $acts->delete();

        return redirect('/acts-reg')->with('status','Master Act Data Deleted');
    }

}
