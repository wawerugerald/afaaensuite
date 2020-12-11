<?php


namespace App\Http\Controllers\backend;
use App\Country;
use App\User;
use App\Institution;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class InstitutionsController extends Controller
{   
    public function reginstitution()
    {
        $institutions = Institution::all();        
        return view ('backend.institution.institutionreg')->with('institutions',$institutions);
    } 
    public function institutionedit(Request $request, $id)
    {
        $institutions = Institution::where('institutionid','=', $id)->first();       
        return view('backend.institution.institutionedit')->with('institutions',$institutions);

    }
    public function institutionupdate(Request $request,$id)
    {
        $institutions = Institution::where('institutionid','=', $id)->update([
        "institutionname" => $request->input('institutionname'),
        "institutionadd"=> $request->input('insititutionaddress'),
        "institutionpost" => $request->input('insititutionpostal'),
        "institutionno" => $request->input('insititutionnumber'), 
        "institutionweb"=> $request->input('institutionweb'),           
        ]);

        return redirect('/institution-reg')->with('status','Arbitration Institution Data Updated');
    }
    public function institutiondelete(Request $request, $id)
    {
        $institutions = Institution::findOrFail($id);
        $institutions->delete();

        return redirect('/institution-reg')->with('status','Arbitration Institution Data Deleted'); 
    }
    public function institutionadd()
    {
        $institutions = Institution::all();


        return view('backend.institution.institutioncreate')->with('institutions',$institutions);
    }
}
