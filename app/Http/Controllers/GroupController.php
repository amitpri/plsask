<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
	    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function groups()
    {
        $currentmenu = 'groups';
        return view('groups', compact('currentmenu'));
    }

    public function default()
    {

        $loggedinid = Auth::user()->id; 

        $groups = Group::where('user_id', '=' , $loggedinid)->where('status', '=' , 1)->orderBy('updated_at','desc')->get(['id','user_id','name', 'notes']);

        foreach ($groups as $group) {
            
            $group['edittrue'] = 0;
            $group['editfalse'] = 1;

        }
                  
        return $groups;
   
    } 

    public function add()
    {
  
        $loggedinid = Auth::user()->id;
        
        $newgroup = Group::create(
                [   'user_id' => $loggedinid, 
                    'key' => str_random(20),
                ]);

        $groups = Group::where('id', '=' , $newgroup->id)->where('user_id', '=' , $loggedinid)
                ->get(['id','user_id','name','notes']);

        foreach ($groups as $group) {
            
            $group['edittrue'] = 1;
            $group['editfalse'] = 0;

        }
 
        return $group; 
   
    }

    public function save(Request $request)
    {
  
        $id = $request->id;

        $loggedinid = Auth::user()->id;

        $group = Group::where('user_id' , '=' ,   $loggedinid)
                    ->where('id', '=' , $id)->first();
 
        $group->name= $request->name;  
        $group->notes= $request->notes; 
        $group->key = str_random(20);
        $group->status= 1;

        $group->save();
     
        return $group; 
   
    } 

    public function delete(Request $request)
    {
 
        $deleteid = $request->deleteid;

        $group = Group::find($deleteid);

        $group->delete(); 

        return "ok"; 
   
    } 

    public function cancel(Request $request)
    {
 
        $id = $request->id; 
        $loggedinid = Auth::user()->id;

        $groupcancel = Group::where('user_id' , '=' ,   $loggedinid)->where('id', '=' , $id)->first();

        return($groupcancel);        
   
    }

    public function filtered(Request $request)
    {

        $groupinput = $request->group;
        $loggedinid = Auth::user()->id;
        
        $groups = Group::
                where('user_id', '=' , $loggedinid)-> 
                where('status', '=' , 1)-> 
                where('name', 'like' , "%$groupinput%")->
                get(['id','name',  'notes']);
 
        foreach ($groups as $group) {
            
            $group['edittrue'] = 0;
            $group['editfalse'] = 1;

        }
                  
        return $groups;
   
    }  

}
