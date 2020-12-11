<?php

namespace App\Http\Controllers\backend;
use App\Country;
use APP\User;
use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class CountriesController extends Controller
{  
    public function regcountries()
    {
         $countries = Country::paginate(5); 
        return view ('backend.countries.countriesreg')->with('countries',$countries);

    }    	
     public function countriesedit(Request $request, $id)
    {
        $countries = Country::where('countryid','=', $id)->first();
        return view('backend.countries.countriesedit')->with('countries',$countries);

    }
     public function countriesupdate(Request $request,$id)
    {
        $countries = Country::where('countryid','=', $id)->update([
        "countryname" => $request->input('countryname'),
        "commonname"=> $request->input('commonname'),
        "countrysummary" => $request->input('countrysummary'),
        "eitistatus" => $request->input('eitistatus'), 
        "eiti2016"=> $request->input('eiti2016'), 
        "dependancy" => $request->input('dependancy'),
        ""
          
        ]);     

        return redirect('/countries-reg')->with('status','Country Data Updated');
    }
     public function countriesadd()
    {
        $countries = Country::all();

        return view('backend.countries.countriescreate')->with('countries',$countries);
    }
     public function countriesstore(Request $request)
    {
       
        $countries = new Country();
        $countries->countryname = $request->input('countryname');
        $countries->commonname = $request->input('commonname');
        $countries->countrysummary = $request->input('countrysummary');
        $countries->eitistatus = $request->input('eitistatus');  
        $countries->dependancy = $request->input('dependancy'); 
        $countries->body = $request->input('arbitration_institution');
        $countries->compliance = $request->input('compliance');
        $countries->arbitrationinstitution = $request->input('arbitrationinstitution');
        if(!is_null($request->file('countrymap')))
        {
            $countries->countrymap = $this->Fileupload($request,'countrymap','images/maps');
        }
        if (!is_null($request->file('countryimage')))
        {
            $countries->countryimage = $this->Fileupload($request,'countryimage','images/countries/');
        }
        $countries->save();

        return redirect('/countries-reg')->with('status','New Country Created ');       

    }
    public function countriesdelete(Request $request, $id)
    {
        $countries = Country::findOrFail($id);
        $countries->delete();

        return redirect('/countries-reg')->with('status','Country Data Deleted');
    }
    public function Fileupload ($request,$file = 'file', $folder) 
    {
                $upload = null;
                //create folder if none
                if (!File::exists($folder)) {
                        File::makeDirectory($folder);
                }
                //chec fo file
                if (!is_null($request->file($file))) {
                        $extension = $request->file($file)->getClientOriginalExtension();
                        $fileName = rand(11111, 99999).uniqid().'.' . $extension;
                        $upload = $request->file($file)->move($folder, $fileName);
                        if ($upload) {
                                $upload = $folder.$fileName;
                        } else {
                                $upload = null;
                        }
                }
        return $upload;
    } 

}

    