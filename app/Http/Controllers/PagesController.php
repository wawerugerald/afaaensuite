<?php

namespace App\Http\Controllers;
use App\Country;
use App\Institution;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public $data ;
    public function __construct()
    {
    	$this->data = [
    		'ug'=>  '',
            'ng'=>  '',
            'st'=>  '',
            'tz'=>  '',
            'sl'=>  '',
            'gw'=>  '',
            'cv'=>  '',
            'sc'=>  '',
            'tn'=>  '',
            'mg'=>  '',
            'ke'=>  '',
            'cd'=>  '',
            'fr'=>  '',
            'mr'=>  '',
            'dz'=>  '',
            'er'=>  '',
            'gq'=>  '',
            'mu'=>  '',
            'sn'=>  '',
            'km'=>  '',
            'et'=>  '',
            'ci'=>  '',
            'gh'=>  '',
            'zm'=>  '',
            'na'=>  '',
            'rw'=>  '',
            'sx'=>  '',
            'so'=>  '',
            'cm'=>  '',
            'cg'=>  '',
            'eh'=>  '',
            'bj'=>  '',
            'bf'=>  '',
            'tg'=>  '',
            'ne'=>  '',
            'ly'=>  '',
            'lr'=>  '',
            'mw'=>  '',
            'gm'=>  '',
            'td'=>  '',
            'ga'=>  '',
            'dj'=>  '',
            'bi'=>  '',
            'ao'=>  '',
            'gn'=>  '',
            'zw'=>  '',
            'za'=>  '',
            'mz'=>  '',
            'sz'=>  '',
            'ml'=>  '',
            'bw'=>  '',
            'sd'=>  '',
            'ma'=>  '',
            'eg'=>  '',
            'ls'=>  '',
            'ss'=>  '',
            'cf'=>  '',
    	];

    }
    public function index(){
    	$countries = Country::with('institution')->get();
    	

    	foreach ($this->data as $key => $dalue) {

    		$this->data[$key] = 'Not Present';

    		foreach ($countries as $country) {
    			if($key == $country->shortcode)
    			{
    				if(!is_null($country->institution))
    				{
    					$this->data[$key] = 'Present';
    				}
    				
    			}
    		}
    	}

    	$data = $this->data;

    	return view('pages.index',compact('data'));
    }

    public function getcompliantCountries($complianceid)
    {
    	$countries = Country::with('institution')->where('compliance','like',"%{$complianceid}%")->get();

    	$data = [];
    	foreach ($countries as $country) {
    		if(!is_null($country->shortcode))
    		{
    			array_push($data, $country->shortcode);
    		}
    	}
    	return $data;
    }
    public function getpresentCountries($presentid)
    {

    	$countries = Country::with('institution')->get();
    	$data = [];   	
    	if($presentid == 1)
    	{
		 	foreach ($countries as  $country) 
	    	{
	    		if($country->body == 1)
	    		{
	    			if(!is_null($country->shortcode))
	    			{
	    				array_push($data, $country->shortcode);
	    			}
	    		}
	    	}

    	}else
    	{
    		foreach ($countries as  $country) 
	    	{
	    		if($country->body == 0)
	    		{
	    			if(!is_null($country->shortcode))
	    			{
	    				array_push($data, $country->shortcode);
	    			}
	    		}
	    	}

    	}
   
    	return $data;
    }
    public function getcountrydetails(Request $request,$name)
    {
    	$countries=Country::where('commonname',$name)->first();

    	// return $countries;
    	return view('countries.viewdetails',compact('countries'));
    }
}
