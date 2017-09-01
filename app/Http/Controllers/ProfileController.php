<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use DB;
use Excel;

use Auth;
use App\User;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profiles()
    {
        $currentmenu = 'profiles';
        return view('profiles', compact('currentmenu'));
    }

    public function default()
    {

        $loggedinid = Auth::user()->id; 

        $profiles = Profile::where('user_id', '=' , $loggedinid)->where('status', '=' , 1)->orderBy('updated_at','desc')->get(['id','user_id','name','emailid','phone','notes']);

        foreach ($profiles as $profile) {
            
            $profile['edittrue'] = 0;
            $profile['editfalse'] = 1;

        }
                  
        return $profiles;
   
    } 

    public function add()
    {
  
        $loggedinid = Auth::user()->id;
        
        $newprofile = Profile::create(
                [   'user_id' => $loggedinid, 
                ]);

        $profiles = Profile::where('id', '=' , $newprofile->id)->where('user_id', '=' , $loggedinid)
                ->get(['id','user_id','name','emailid','phone','notes']);

        foreach ($profiles as $profile) {
            
            $profile['edittrue'] = 1;
            $profile['editfalse'] = 0;

        }
 
        return $profile; 
   
    }

    public function save(Request $request)
    {
  
        $id = $request->id;

        $loggedinid = Auth::user()->id;

        $profile = Profile::where('user_id' , '=' ,   $loggedinid)
                    ->where('id', '=' , $id)->first();
 
        $profile->name= $request->name; 
        $profile->emailid= $request->emailid; 
        $profile->phone= $request->phone; 
        $profile->notes= $request->notes; 
        $profile->status= 1;

        $profile->save();
     
        return $profile; 
   
    } 

    public function delete(Request $request)
    {
 
        $deleteid = $request->deleteid;

        $profile = Profile::find($deleteid);

        $profile->delete(); 

        return "ok"; 
   
    } 

    public function cancel(Request $request)
    {
 
        $id = $request->id; 
        $loggedinid = Auth::user()->id;

        $profilecancel = Profile::where('user_id' , '=' ,   $loggedinid)->where('id', '=' , $id)->first();

        return($profilecancel);        
   
    }

    public function filtered(Request $request)
    {

        $profileinput = $request->profile;
        $loggedinid = Auth::user()->id;
        
        $profiles = Profile::
                where('user_id', '=' , $loggedinid)->
                where('status', '=' , 1)-> 
                where('name', 'like' , "%$profileinput%")->
                get(['id','name', 'emailid', 'phone', 'notes']);
 
        foreach ($profiles as $profile) {
            
            $profile['edittrue'] = 0;
            $profile['editfalse'] = 1;

        }
                  
        return $profiles;
   
    }  

    public function upload(Request $request)
    {
        $currentmenu = 'profiles';
        return view('profileupload', compact('currentmenu'));
    } 

    public function uploadexcel()
    {
        $loggedinid = Auth::user()->id;

        if(Input::hasFile('import_file')){

            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();

            $rowcount = 1;

            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {  
                    $inserts[] = [
                        'name' => $value->name,
                        'emailid' => $value->emailid,
                        'phone' => $value->phone,                        
                        'notes' => $value->notes,
                        'status' => 1,
                        'user_id' => $loggedinid,
                        ];

                    $rowcount = $rowcount + 1;

                    if ($rowcount > 101){
                        exit;
                    }
                }
                if(!empty($inserts)){ 
                    DB::table('profiles')->insert($inserts);
                }
            }
        } 

        $currentmenu = 'profiles';
        return view('profileupload_success', compact('inserts','currentmenu'));       

    } 



}
