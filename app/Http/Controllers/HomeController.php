<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Setting;
use App\Topic;
use App\Feedback;
use App\Dashboard;
use App\Jobs\Dashboardupdate;

use Illuminate\Http\Request;

class HomeController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function topicname(Request $request)
    {

        $topic_id =  $request->topic_id;

        $loggedinid = Auth::user()->id;  

        $topic = Topic::where('id','=',$topic_id)->where('user_id','=',$loggedinid)->first(['id','topic','created_at']);

        return $topic;
    }

    public function profile()
    {
        
        $currentmenu = 'profile';

        $loggedinid = Auth::user()->id;   
  
        $mrprofile = User::where('id','=',$loggedinid)->first(['id','name','email','phone','city','country','company','company_role','details','company_designation','whatsapp','facebook','twitter','linkedin']); 

        return view('profile', compact('currentmenu','mrprofile'));
    }

    public function profiledefault()
    {
         
        $loggedinid = Auth::user()->id;   
  
        $mrprofile = User::where('id','=',$loggedinid)->first(['id','name','email','phone','city','country','company','company_role','details','company_designation','whatsapp','facebook','twitter','linkedin']); 

        return $mrprofile;
    }

    public function editprofile($param, Request $request)
    {
             
        $loggedinid = Auth::user()->id;
        $myprofile = User::find($loggedinid);

        $val = $request->val;

        if ( $param == 'name') $myprofile->name = $val;
        if ( $param == 'email') $myprofile->email = $val;
        if ( $param == 'phone') $myprofile->phone = $val;
        if ( $param == 'city') $myprofile->city = $val;
        if ( $param == 'country') $myprofile->country = $val;        
        if ( $param == 'details') $myprofile->details = $val; 
        if ( $param == 'company') $myprofile->company = $val;
        if ( $param == 'role') $myprofile->company_role = $val;
        if ( $param == 'designation') $myprofile->company_designation = $val;
        if ( $param == 'whatsapp') $myprofile->whatsapp = $val;
        if ( $param == 'facebook') $myprofile->facebook = $val;
        if ( $param == 'twitter') $myprofile->twitter = $val;
        if ( $param == 'linkedin') $myprofile->linkedin = $val; 
      

        $myprofile->save();
             
        return $myprofile->name;
    }

    public function mypictures()
    {
        $currentmenu = 'settings';

        $loggedinid = Auth::user()->id;   
  
        $mrprofile = User::find($loggedinid);
   
        return view('mypictures', compact('currentmenu','mrprofile','loggedinid'));
    } 

    public function settings()
    {
        $currentmenu = 'settings';

        $loggedinid = Auth::user()->id;   
   

        $settings = Setting::updateOrCreate([ 'user_id' => $loggedinid ],['user_id' => $loggedinid]); 
   
        return view('settings', compact('currentmenu','settings'));
    }

    public function settingsedit($param, Request $request)
    {
        $loggedinid = Auth::user()->id;
        
        $val = $request->val;

        if ( $param == 'searchable'){
          $searchable = $val; 
          $setting = Setting::updateOrCreate([ 'user_id' => $loggedinid ],['user_id' => $loggedinid,'searchable' => $searchable]); 
        } 

        if ( $param == 'share'){
          $share = $val; 
          $setting = Setting::updateOrCreate([ 'user_id' => $loggedinid ],['user_id' => $loggedinid,'share' => 
            $share]); 
        }

        return $setting->id;
    }

    public function dashboard()
    {
        $currentmenu = 'dashboard';
        $loggedinid = Auth::user()->id; 

        $this->dispatch(new Dashboardupdate);

        $dashboard = Dashboard::where('user_id', '=' , $loggedinid)->first(['feedbacktotal','feedbacktoday','visittotal','visittoday', 'topics','profiles']);

        return view('dashboard', compact('currentmenu','dashboard'));
    }
    
    public function reviews()
    {
        $currentmenu = 'reviews';
        return view('reviews', compact('currentmenu'));
    }

    public function reviewsdefault()
    {
        $loggedinid = Auth::user()->id; 
        
        $feedbacks = Feedback::where('user_id', '=' , $loggedinid)->where('status', '=' , 1)->where('published', '=' , 1)->orderBy('updated_at','desc')->get(['id','topic_id','topic','review', 'updated_at'])->take(10);
                  
        return $feedbacks;
    }

    public function reviewsfiltered(Request $request)
    {

        $topicsinput = $request->topics;
        $loggedinid = Auth::user()->id;
        
        $feedbacks = Feedback::
                where('user_id', '=' , $loggedinid)-> 
                where('topic', 'like' , "%$topicsinput%")->
                get(['id','topic_id','topic','review', 'updated_at']);
                  
        return $feedbacks;
   
    } 

    public function reviewstopics($id)
    {

        $loggedinid = Auth::user()->id;
        $currentmenu = 'reviews';
        
        $topic = Topic::where('id','=',$id)->where('user_id','=',$loggedinid)->first(['id','topic','created_at']); 

        return view('reviewstopics',compact('currentmenu','topic'));
   
    } 

    public function reviewstopicsdefault(Request $request)
    {

        $loggedinid = Auth::user()->id;
        $topic_id  = $request->topic_id;
        
        $feedbacks = Feedback::where('topic_id','=',$topic_id)->where('user_id','=',$loggedinid)->get(['id','topic','review','created_at']); 

        return $feedbacks;
   
    } 

    public function imageupload(Request $request)
    {

        return "done";


    }

    
}
