<?php

namespace App\Http\Controllers\frontend;

use App\User;
use App\Contributor;
use App\Country;
use App\UserCountry;
use App\Organisation;
use App\DataDump;
use App\Title;
use App\Chapter;
use App\Part;
use App\Section;
use App\Subsection;
use App\Article;
use App\ComparisonAdmin;
use App\Utils\Data;
use App\Logactivity;
use App\Comments;
use App\Institution;
use File;
use Validator;
use Toastr;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;

class ContributorController extends Controller
{
    public function contributorprofilecreate()
    {
        $contributors=Contributor::all();
        $organisations=Organisation::all();
        $users=User::all();
        $countries=Country::all();
        $usercountries=UserCountry::all();
        $comments=Comments::all();
        $user = User::find(Auth::user()->id);

        return view('frontend.contributorprofilecreate',compact('user','contributors','organisations','countries','usercountries','trait','comments'));
    }
    public function updateContributorProfile(Request $request)
    {

        $contributer = User::find(Auth::user()->id);
        $contributer->countryresidence = $request->residentcountry;
        $contributer->twitter = $request->twitter;
        $contributer->linkedin = $request->linkedin;
        $contributer->titles = $request->title;
        $contributer->academicqualifications = $request->academicqualification;
        $contributer->gender = $request->gender;
        $contributer->language = $request->language;
        $contributer->biography  = $request->biography;
        $contributer->currentorganisation  = $request->currentorganisation;
        $contributer->completedprofile = 1;
		if (!is_null($request->file('profileimage')))
        {
			$contributer->profileimage = $this->Fileupload($request,'profileimage','images/contributors/');
		}
        $contributer->save();

          Toastr::success('User Profile has been Updated.');

        return redirect('/contributor-home');
    }
    public function contributorprofileupdate(Request $request, $id)
    {
        $contributors = User::find($id);
        $contributors->name = $request->input('name');
        $contributors->email = $request->input('email');
        $contributors->profileimage = $request->input('profileimage');
        $contributors->update();

        return redirect('/contributor-home')->with('');
    }
    public function contributorhome()
    {
        $user = User::find(Auth::user()->id);
        $contributors=Contributor::all();
        $organisations=Organisation::all();
        $users=User::all();
        $countries=Country::all();
        $usercountries=UserCountry::where('user_id',$user->id)->get();
        $docs=DataDump::all();
        $comments=Comments::all();
        $util = new Data();
        return view('frontend.contributor.contributorhome', compact('contributer','contributors','organisations','users','countries','usercountries','user','docs','util','comments'));
    }
    public function contributorusercountry(Request $request,$id)
    {
        $user = User::find(Auth::user()->id);
        $contributors=Contributor::all();
        $organisations=Organisation::all();
        $users=User::all();
        $countries=Country::all();
        $usercountries=UserCountry::where('user_id',$user->id)->get();
        $usercountriess=UserCountry::all();
        $docs=DataDump::all();
        $util = DataDump::orderBy('countryid','asc')->where('countryid',$id)->limit(20)->get();

        return view('frontend.contributor.usercountrydocument', compact('contributer','contributors','organisations','users','countries','usercountries','user','docs','util','id','usercountriess'));
    }
    public function countryviewdocuments(Request $request,$id)
    {   $docs=DataDump::all();
        $util = DataDump::orderBy('countryid','asc')->where('countryid',$id)->limit(20)->get();
        $user = User::find(Auth::user()->id);
        $usercountry=UserCountry::where('user_id',$user->id)->where('countryid',$id)->get()->first();
        $country=Country::where('countryid',$id)->get()->first();
        // dd($usercountry);
        // return;
        return view('frontend.contributor.usercountrydocument', compact('user','usercountry','id','docs','util','country','comments'));
    }
    public function legislativedocumentcreate(Request $request,$id)
    {
        $user=Auth::User();
        $legislativedocument=DataDump::all();
        $country=Country::all();

        return view('frontend.contributor.legislativedocumentcreate',compact('legislativedocument','user','country','id'));

    }
    public function comparisonadmindocumentcreate(Request $Request, $id)
    {
        $users=Auth::User();
        $comparisonadmindocument=ComparisonAdmin::all();
        $contributordocuments = DataDump::all();
        $doctypeselected = DataDump::where('primaryusedefault','=',1)->get();
        $user = User::find(Auth::user()->id);
        $usercountries=UserCountry::all();
        //
        $country=Country::all();

        // dd($doctypeselected);
        // return;
        return view('frontend.contributor.comparisonadmindocumentcreate',compact('comparisonadmindocument','users','user','usercountries','contributordocuments','country','id','doctypeselected'));
    }

    public function comparisonfetchparts($id)
    {
       $documentparts=Chapter::where('heirachyid',$id)->get();

       return $documentparts;
    }
    public function storeContributorDocument(Request $request)
    {

      $request->validate([
        'title' => ['required'],
        'date' => ['required'],
      ]);

        $contributordcocumentstore = New DataDump();
        $contributordcocumentstore->title = $request->input('title');
        $contributordcocumentstore->enactdate = $request->input('date');
        $contributordcocumentstore->titletext = $request->input('titletext');
        $contributordcocumentstore->primaryusedefault = ($request->input('show_option')) ? implode(",", $request->input('show_option')) : ' ';
        if (!is_null($request->file('docuploaded')))
        {
         $contributordcocumentstore->docuploaded = $this->Fileupload($request,'docuploaded','documentsuploaded/contributors/');
        }
        $contributordcocumentstore->doctype = $request->input('type');
        $contributordcocumentstore->heirachy1 = $request->input('heirachy1');
        $contributordcocumentstore->heirachy2 = $request->input('heirachy2');
        $contributordcocumentstore->heirachy3 = $request->input('heirachy3');
        $contributordcocumentstore->heirachy4 = $request->input('heirachy4');
        $contributordcocumentstore->heirachy5 = $request->input('heirachy5');
        $contributordcocumentstore->heirachy6 = $request->input('heirachy6');
        $contributordcocumentstore->heirachytitle1 = $request->input('heirachytitle1');
        $contributordcocumentstore->heirachytitle2 = $request->input('heirachytitle2');
        $contributordcocumentstore->heirachytitle3 = $request->input('heirachytitle3');
        $contributordcocumentstore->heirachytitle4 = $request->input('heirachytitle4');
        $contributordcocumentstore->heirachytitle5 = $request->input('heirachytitle5');
        $contributordcocumentstore->heirachytitle6 = $request->input('heirachytitle6');
        $contributordcocumentstore->showheirachy1 = $request->input('heirachy1showarticlenumber');
        $contributordcocumentstore->showheirachy2 = $request->input('heirachy2showarticlenumber');
        $contributordcocumentstore->showheirachy3 = $request->input('heirachy3showarticlenumber');
        $contributordcocumentstore->showheirachy4 = $request->input('heirachy4showarticlenumber');
        $contributordcocumentstore->showheirachy5 = $request->input('heirachy5showarticlenumber');
        $contributordcocumentstore->showheirachy6 = $request->input('heirachy6showarticlenumber');
        $contributordcocumentstore->enumeratorheirachy1 = $request->input('heirachy1enumerator');
        $contributordcocumentstore->enumeratorheirachy2 = $request->input('heirachy2enumerator');
        $contributordcocumentstore->enumeratorheirachy3 = $request->input('heirachy3enumerator');
        $contributordcocumentstore->enumeratorheirachy4 = $request->input('heirachy4enumerator');
        $contributordcocumentstore->enumeratorheirachy5 = $request->input('heirachy5enumerator');
        $contributordcocumentstore->enumeratorheirachy6 = $request->input('heirachy6enumerator');
        $contributordcocumentstore->user_id = Auth::user()->id;
        $contributordcocumentstore->countryid = $request->input('countryid');
        $contributordcocumentstore->save();

        Toastr::success('Document heirachy has been saved. Proceed with creating the document.');

        return redirect('/document-view/'.$contributordcocumentstore->id.'/'.$contributordcocumentstore->countryid)->with('status','Legislative Document Created');

    }
    public function storecomparisonadmindocument(Request $request)
    {
        // $comparisonadminstore = New
    }
    public function docview(Request $request, $id, $countryid)
    {
        $docs = DataDump::where('heirachyid','=',$id)->first();
        $countries=Country::all();
        $usercountries=UserCountry::all();
        $user = User::find(Auth::user()->id);
        $comments=Comments::with('user')->orderBy('id','DESC')->where('countryid',$countryid)->where('docheirachyid',$id)->limit(10)->get();


        return view('frontend.contributor.contributordocdetails',compact('docs','countries','usercountries','user','comments','countryid'));
    }
    public function feedbackcreate(Request $request,$id)
    {
       $user=Auth::user();
       $comments=Comments::all();
       $country=Country::all();

       return view('frontend.contributor.commentscreate',compact('user','comments','country','id'));
    }
    //to confirm
    public function storefeedback(Request $request)
    {
        $storecomments = New Comments();
        $storecomments->user_id = Auth::user()->id;
        $storecomments->docheirachyid = $request->input('docid');
        $storecomments->countryid = $request->input('countryid');
        $storecomments->comment = $request->input('comment');
        $storecomments->chapter = $request->input('chapter');
        $storecomments->part = $request->input('part');
        $storecomments->section = $request->input('section');
        $storecomments->subsection = $request->input('subsection');
        $storecomments->save();
        $comments=$storecomments->with('user')->orderBy('id','DESC')->where('countryid',$request->input('countryid'))->where('docheirachyid',$request->input('docid'))->limit(10)->get();
        return redirect('/document-view/'.$request->input('docid').'/'.$request->input('countryid'))->with(['comments'=>$comments]);
    }

    public function titlestore(Request $request)
    {
         $id = $request->input('docid');
         $country = $request->input('countryid');
		 $titles=new Title();
		 $titles->titlename = $request->input('titlename');
		 $titles->titletext = $request->input('titletext');
         $titles->heirachyid = $id;
		 $titles->save();

		 return redirect('/document-view/'.$id.'/'.$country);
    }
    public function chapterstore(Request $request)
    {
        $id = $request->input('docid');
        $country = $request->input('countryid');
    	$chapters= new Chapter();
    	$chapters->chaptername = $request->input('chaptername');
    	$chapters->chaptertext = $request->input('chaptertext');
        $chapters->heirachyid = $id;
        $chapters->title_id = $request->input('title');
    	$chapters->save();

    	return redirect('/document-view/'.$id.'/'.$country);
    }
    public function partstore(Request $request)
    {
    	$id = $request->input('docid');
      $country = $request->input('countryid');
    	$parts= new Part();
    	$parts->partname = $request->input('partname');
    	$parts->parttext = $request->input('parttext');
    	$parts->heirachyid = $id;
    	$parts->title_id = $request->input('title');
    	$parts->chapterid = $request->input('chapter');
    	$parts->save();

    	return redirect('/document-view/'.$id.'/'.$country);

    }
    public function sectionstore(Request $request)
    {
    	$id = $request->input('docid');
      $country = $request->input('countryid');
    	$sections= new section();
    	$sections->sectionname = $request->input('sectionname');
    	$sections->sectiontext = $request->input('sectiontext');
    	$sections->heirachyid = $id;
    	$sections->title_id = $request->input('title');
    	$sections->chapterid = $request->input('chapter');
    	$sections->partid = $request->input('part');
    	$sections->save();

    	return redirect('/document-view/'.$id.'/'.$country);
    }
    public function subsectionstore(Request $request)
    {
    	$id = $request->input('docid');
      $country = $request->input('countryid');
    	$subsections = new Subsection();
    	$subsections->subsectionname = $request->input('subsectionname');
    	$subsections->subsectiontext = $request->input('subsectiontext');
    	$subsections->heirachyid = $id;
    	$subsections->title_id = $request->input('title');
    	$subsections->chapterid = $request->input('chapter');
    	$subsections->partid = $request->input('part');
    	$subsections->sectionid = $request->input('section');
    	$subsections->save();

    	return redirect('/document-view/'.$id.'/'.$country);
    }
    public function articlestore (Request $request)
    {
    	$id = $request->input('docid');
      $country = $request->input('countryid');
    	$articles = new Article();
    	$articles->articlename = $request->input('articlename');
    	$articles->articletext = $request->input('articletext');
    	$articles->heirachyid = $id;
    	$articles->title_id = $request->input('title');
    	$articles->chapterid = $request->input('chapter');
    	$articles->partid = $request->input('part');
    	$articles->sectionid = $request->input('section');
    	$articles->subsectionid = $request->input('subsection');
    	$articles->save();

    	return redirect('/document-view/'.$id.'/'.$country);
    }
    public function editeddocumentstore(Request $request)
    {
        $editeddocumentstore = New DataDump();
        $editeddocumentstore->doctexts = $request->input('editeddocument');

        $editeddocumentstore->save();
    }

    public function countriesedit(Request $request, $id)
    {
        $country = Country::where('countryid','=', $id)->first();
        $institution = Institution::all();
        return view('frontend.contributor.countriesedit',compact('country','institution'));
    }
    public function countriesupdate(Request $request,$id)
    {

        $countryselected= new Country();
        $country = $countryselected->with('institution')->where('countryid','=', $id)->get()->first();
        $country->countryname = $request->input('countryname');
        $country->commonname = $request->input('commonname');
        $country->countrysummary = $request->input('countrysummary');
        $country->eitistatus = $request->input('eitistatus');
        $country->dependancy = $request->input('dependancy');
        $country->body = $request->input('arbitration_institution');
        // $country->compliance = implode(",", $request->input('compliance'));
        // $country->compliance = $request->input('compliance');
        $country->arbitrationinstitution = $request->input('arbitrationinstitution');
        if(!is_null($request->file('countrymap')))
        {
            $country->countrymap = $this->Fileupload($request,'countrymap','images/maps/');
        }
        if(!is_null($request->file('countryimage')))
        {
        $country->countryimage = $this->Fileupload($request,'countryimage','images/countries/');
        }
        $country->save();

        return redirect('/contributor-countryview/'.$id)->with('status','Country Details Updated ');;
    }

    public function getTitleText(Request $request,$id){

        $title = Title::where('id',$id)->first();
        if(empty($title->titletext)){
            return '';
        }else{
            return $title->titletext;
        }

    }

    public function getChapterText(Request $request,$id){

        $title = Chapter::where('id',$id)->first();
        if(empty($title->chaptertext)){
            return '';
        }else{
            return $title->chaptertext;
        }

    }

      public function getPartText(Request $request,$id){

        $title = Part::where('id',$id)->first();
        if(empty($title->parttext)){
            return '';
        }else{
            return $title->parttext;
        }

    }

     public function getSectionText(Request $request,$id){

        $title = Section::where('id',$id)->first();
        if(empty($title->sectiontext)){
            return '';
        }else{
            return $title->sectiontext;
        }
    }

    public function getSubsectionText(Request $request,$id){

        $title = Subsection::where('id',$id)->first();
        if(empty($title->subsectiontext)){
            return '';
        }else{
            return $title->subsection;
        }
    }

      public function getArticleText(Request $request,$id){

        $title = Article::where('id',$id)->first();
        if(empty($title->articletext)){
            return '';
        }else{
            return $title->articletext;
        }
    }

    public function levelSaveText(Request $request){
      $level = $request->input('level');
      $id = $request->input('levelID');
       if(empty($level)){
           $msg = "Please select a level first.";
           return response()->json(array('error' => $msg), 200);

       }else {
           if ($level === 'title'){
               $title = Title::where('id', $id)->first();
               $title->titletext = $request->input('text');
               $title->save();
               $msg = "The Title Text has been save Successfully.";
               return response()->json(array('msg' => $msg), 200);

           } elseif ($level === 'chapter'){

               $chapter = Chapter::where('id',$id)->first();
               //dd($chapter);
               $chapter->chaptertext = $request->input('text');
               $chapter->save();

               $msg = "The Chapter Text has been save Successfully.";
               return response()->json(array('msg' => $msg), 200);

           } elseif($level === 'part'){

               $part = Part::where('id',$id)->first();
               $part->parttext = $request->input('text');
               $part->save();
               $msg = "The Part Text has been save Successfully.";
               return response()->json(array('msg' => $msg), 200);

           }elseif($level === 'section'){

               $section = Section::where('id',$id)->first();
               $section->sectiontext = $request->input('text');
               $section->save();

               $msg = "The Section Text has been save Successfully.";
               return response()->json(array('msg' => $msg), 200);

           }elseif($level === 'subsection') {
               $subsection = Subsection::where('id',$id)->first();
               $subsection->subsectiontext = $request->input('text');
               $subsection->save();

               $msg = "The Section Text has been save Successfully.";
               return response()->json(array('msg' => $msg), 200);

           }elseif ($level === 'article') {
               $article = Article::where('id',$id)->first();
               $article->articletext = $request->input('text');
               $article->save();

               $msg = "The Section Text has been save Successfully.";
               return response()->json(array('msg' => $msg), 200);
           }
       }

    }
    protected function Fileupload ($request,$file = 'file', $folder)
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
