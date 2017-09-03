<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Group;
use App\Profile;
use App\GroupProfile;
use Illuminate\Http\Request;

class GroupProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index( $id , Request $request)
    {

        $currentmenu = 'groups';

        $groupid = $id;

        $loggedinid = Auth::user()->id;

        $groups = Group::where('user_id' , '=' , $loggedinid)->where('id' , '=' , $groupid)->first(['id','name','notes']);        
        return view('groupsprofile', compact('groups' , 'currentmenu'));
   
    } 

    public function defaultadded($group_id)
    {

        $loggedinid = Auth::user()->id; 
        $group_id = $group_id;

        $groups = GroupProfile::where('user_id', '=' , $loggedinid)->where('group_id', '=' , $group_id)->where('status', '=' , 1)->orderBy('updated_at','desc')->get(['id','user_id','name', 'emailid' , 'phone']);

                  
        return $groups;
   
    } 

    public function defaultavailable($group_id)
    {

        $loggedinid = Auth::user()->id; 
        $group_id = $group_id;

        $groups =  Profile::where('user_id', '=' , $loggedinid)->where('status', '=' , 1)->orderBy('updated_at','desc')->get(['id','user_id','name', 'emailid' , 'phone']);

                  
        return $groups;
   
    } 

    public function add($group_id, Request $request)
    {
  
        $loggedinid = Auth::user()->id;

        $getprofile = Profile::
            where('id' , '=' , $request->id )-> 
            where('name', '=' ,   $request->name)->            
            first(['id','user_id','name','emailid','phone']);

        $creategroupprofile = GroupProfile::create(
                [   
                    'user_id' => $loggedinid,
                    'name' => $getprofile->name,
                    'group_id' => $group_id,
                    'emailid' => $getprofile->emailid,
                    'phone' => $getprofile->phone,
                    'status' => 1,                                 
                ]);
 

        return $creategroupprofile;  
   
    }

     

    public function delete(Request $request)
    {
 
        $deleteid = $request->deleteid;

        $group = GroupProfile::find($deleteid);

        $deletedgroup = $group;

        $group->delete(); 

        return $deletedgroup; 
   
    } 
 

    public function filtered1(Request $request)
    {

        $emailinput = $request->emailid;
        $loggedinid = Auth::user()->id;
        
        $groups = Profile::
                where('user_id', '=' , $loggedinid)-> 
                where('emailid', 'like' , "%$emailinput%")->
                get(['id','name',  'emailid' , 'phone']);
 
                  
        return $groups;
   
    }  

    public function filtered2(Request $request)
    {

        $emailinput = $request->emailid;
        $loggedinid = Auth::user()->id;
        
        $groups = GroupProfile::
                where('user_id', '=' , $loggedinid)-> 
                where('emailid', 'like' , "%$emailinput%")->
                get(['id','name',  'emailid' , 'phone']);
 
                  
        return $groups;
   
    }  



}
