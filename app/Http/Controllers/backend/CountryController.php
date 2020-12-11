<?php



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use APP\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function regcountries()
    {
         $countries = Country::all();
        return view ('backend.countries.countriesreg')->with('countries',$countries);
    }

     public function countriesedit(Request $request, $id)
    {
        $countries = Country::findOrFail($id);
        return view('backend.countries.countriesedit')->with('countries',$countries);

    }

     public function countriesupdate(Request $request,$id)
    {
        $countries = Country::find($id);
        $countries->countryname = $request->input('countryname');
        $countries->commonname = $request->input('commonname');
        $countries->eiti = $request->input('eiti');  
        $countries->dependancy = $request->input('dependancy');       
        $countries->update();


        return redirect('/countries-reg')->with('status','Country Data Updated');
    }   

    public function countriesdelete(Request $request, $id)
    {
        $countries = Country::findOrFail($id);
        $countries->delete();

        return redirect('/countries-reg')->with('status','Country Data Deleted');
    }
 
    
   
  

}
