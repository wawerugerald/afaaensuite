<?php

namespace App\Http\Controllers\frontend;

use App\User;
use App\Reviewerpublisher;
use App\Country;
use App\Organisation;
use App\UserCountry;
use App\DataDump;
use App\Utils\Data;
use App\Logactivity;
use App\Comments;

use File;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class ReviewerpublisherController extends Controller
{	 
    public function reviewerpublisherprofilecreate()
    {	
    	$organisations=Organisation::all();
        $users=User::all();
        $countries=Country::all();
        $usercountries=UserCountry::all();
		$reviewerpublisher=Reviewerpublisher::all();
	    $user = User::find(Auth::user()->id);

     return view('frontend.reviewerpublisherprofilecreate',compact('user','reviewerpublisher','organisations','users','countries','usercountries'));
    }
    public function reviewerpublisherprofilestore(Request $request)
    {
    	$reviewerpublisher = User::find(Auth::user()->id);
        $reviewerpublisher->countryresidence = $request->residentcountry;
        $reviewerpublisher->gender = $request->gender;
        $reviewerpublisher->language = $request->language;
        $reviewerpublisher->completedprofile = 1;
        if (!is_null($request->file('profileimage')))
        {
			$reviewerpublisher->profileimage = $this->Fileupload($request,'profileimage','images/reviewerpublishers/');
		}

         $reviewerpublisher->save();

		return redirect('/reviewerpublisher-home');
    }
    public function reviewerpublisherhome()
    {

        $user = User::find(Auth::user()->id);
        $contributors=Reviewerpublisher::all();
        $organisations=Organisation::all();
        $users=User::all();
        $countries=Country::all();
        $usercountries=UserCountry::where('user_id',$user->id)->get();
        $docs=DataDump::all();
        $comments=Comments::all();
        $util = new Data();
    	return view('frontend.reviewerpublisher.reviewerpublisherhome',compact('contributer','contributors','organisations','users','countries','usercountries','user','docs','util','comments'));
    }
    public function reviewerpublisherviewdocuments(Request $request,$id)
    {
        $docs=DataDump::all();
        $util = DataDump::orderBy('countryid','asc')->where('countryid',$id)->limit(20)->get();
        $user = User::find(Auth::user()->id);
        $usercountry=UserCountry::where('user_id',$user->id)->where('countryid',$id)->get()->first();
        $country=Country::where('countryid',$id)->get()->first();


        return view('frontend.reviewerpublisher.usercountrydocument', compact('user','usercountry','id','docs','util','country','comments'));
    }

    public function reviewerpublisherdocview(Request $request,$id)
    {
        $docs = DataDump::where('heirachyid','=',$id)->first();
        $countries=Country::all();
        $usercountries=UserCountry::all();
        $user = User::find(Auth::user()->id);
        $comments=Comments::all();

         return view('frontend.reviewerpublisher.reviewdocument',compact('docs','countries','usercountries','user','comments'));
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
