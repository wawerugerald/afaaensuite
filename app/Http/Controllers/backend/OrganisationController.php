<?php

namespace App\Http\Controllers\backend;

use App\Organisation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class OrganisationController extends Controller
{
   
    public function organisationreg()
    {
        $organisations = Organisation::all();

        return view ('backend.organisations.organisationreg')->with('organisations',$organisations);
    }

    public function organisationadd()
    {
        $organisations = Organisation::all();

        return view('backend.organisations.organisationcreate')->with('organisations',$organisations);
    }

    public function organisationstore(Request $request)
    {
       
        $organisations = new Organisation();
        $organisations->organisationname = $request->input('organisationname');
        $organisations->organisationadd = $request->input('organisationaddress');
        $organisations->organisationno = $request->input('organisationnumber');
        $organisations->organisationweb = $request->input('organisationwebsite');  
        
        $organisations->save();

        return redirect('/organisation-reg')->with('status','New Organisation Created ');       

    } 
    public function organisationedit(Request $request, $id)
    {
        $organisations = Organisation::where('organisationid','=', $id)->first(); 

        return view('backend.organisations.organisationedit')->with('organisations',$organisations);

    }
    public function organisationupdate(Request $request,$id)
    {
        $organisations = Organisation::where('organisationid','=', $id)->update([
        "organisationname" => $request->input('organisationname'),
        "organisationadd"=> $request->input('organisationaddress'),
        "organisationno" => $request->input('organisationnumber'),       
        "organisationweb"=> $request->input('organisationwebsite'),           
        ]);   
      


        return redirect('/organisation-reg')->with('status','Organisation Data Updated');
    }  

    public function organisationdelete(Request $request, $id)
    {
        $organisations = Organisation::findOrFail($id);
        $organisations->delete();

        return redirect('/organisation-reg')->with('status','Organisation Data Deleted'); 
    }
  
}
