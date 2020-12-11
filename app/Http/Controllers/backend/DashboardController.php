<?php

namespace App\Http\Controllers\backend;
use App\Country;
use APP\User;
use App\UserCountry;
use App\ComparisonAdmin;
use App\PasswordReset;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use DB;


class DashboardController extends Controller
{   
    public function registered(){

        $users = User::paginate(10);     
        $countries = Country::all();    

        return view('backend.users.tableusers',compact('users','countries'));
    }

     public function usersadd()
    {
        $users = User::all();


        return view('backend.users.userscreate')->with('users',$users);
    }
    public function usersstore(Request $request)
    {
        $users = new user();
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->roles = $request->input('roles');
        $users->language = $request->input('language');
        $users->password = Hash::make($request->input('password'));             
        $users->save();
        //initiate password reset        
         $reset = new PasswordReset();
         $reset->email = $users->email;
         $reset->token = self::generateRandomString(60);

         $reset->save();

         $result = Mail::send('emails.verify',['url' => route('password.reset', $reset->token)],
              function ($message) use ($users) {
                $message->from('support@farwell-consultants.com', 'Welcome to Afaa');
                $message->to($users->email);
                $message->subject('Account Activation');
          });        

        return redirect('/users-reg')->with('status','New User has been Created '.json_encode($result));     

    } 
    public function useredit(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $countries = Country::all();
        return view('backend.users.usersedit',compact('users','countries'));       

    }
    public function usersupdate(Request $request,$id)
    {
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->roles = $request->input('roles');
        $users->isban = $request->input('ban');
        $users->language = $request->input('language');
        $users->status = $request->input('status'); 
        $users->country_id = $request->input('assigncountry');      
        $users->update();

        return redirect('/users-reg')->with('status','User Data Updated');
    }     
    public function usershow(Request $request, $id){
            $users= User::with('countries')->findOrFail($id);
            $countries=Country::all();
            $comparisonadmin=ComparisonAdmin::all();

            $countrymodel = new Country();
            
             return view('backend.users.usersshow',compact('users','countries','countrymodel')); 
            
    }   
    public function comparisonrightstore(Request $request,$id)
    {
        $country = new UserCountry();      
        $user = new User(); 
        $user = User::find($id);
        $country->user_id = $user->id;
        $country->countryid = $request->assigncountry;
        $country->roles = $request->input('roles');
        $country->status = $request->input('status');
        $user->countries()->save($country);  
        
        return redirect(URL::previous());       
    }
    public function documentrigtstore(Request $request,$id)
    {
        $country = new UserCountry();      
        $user = new User(); 
        $user = User::find($id);
        $country->user_id = $user->id;
        $country->countryid = $request->assigncountry;
        $country->roles = $request->input('roles');
        $country->status = $request->input('status');
        $user->countries()->save($country);  
        
        return redirect(URL::previous()); 
    }    
    public function usersdelete(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/users-reg')->with('status','User Data Deleted');
    }
    protected function generateRandomString($length = 10)
    {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++)
      {
        $randomString .= $characters[ rand(0, $charactersLength - 1) ];
      }

      return $randomString;
    }
  
}
