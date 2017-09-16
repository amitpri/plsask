<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Topic;
use App\Profile;
use App\Group;
use App\TopicMail;
use App\Mail\MailTopic;
use App\GroupProfile;

use Illuminate\Http\Request;
use App\Jobs\SendMail;
use App\Jobs\Newtopic;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function topics()
    {
        $currentmenu = 'topics';
        return view('topics', compact('currentmenu'));
    }

    public function getmytopic()
    {
        $loggedinid = Auth::user()->id; 

        $topics = Topic::where('user_id', '=' , $loggedinid)->orderBy('updated_at','desc')->get(['id','key','user_id','topic','category','type','details']);         
                  
        return $topics;
    }

    public function savetopic(Request $request)
    {
        $loggedinid = Auth::user()->id; 
        $loggedinname = Auth::user()->name;

        $user = User::where('id', '=' , $loggedinid)->first(['key' , 'email']);

        $user_key = $user->key;
        $email = $user->email;
        $topic = $request->topic;
        $details = $request->details;
        $type = $request->type;
        $category = $request->category;
        $key = str_random(20);

        $job = new Newtopic($key, $topic, $email);

        $newtopic = Topic::create(
                [   'user_id' => $loggedinid, 'key' => $key,'name' => $loggedinname, 'user_key' => $user_key ,   'topic' => $topic, 'type' => $type, 'category' => $category, 'details' => $details, 
                ]);    

        $this->dispatch($job);

        return $newtopic;
    }

    public function saveedittopic(Request $request)
    {
        $loggedinid = Auth::user()->id; 

        $topic = $request->topic;
        $details = $request->details;
        $type = $request->type;
        $category = $request->category;
        $key = str_random(20);
        $id = $request->id; 

        $updatetopic = Topic::updateOrCreate([ 'user_id' => $loggedinid, 'id' => $id  ],['topic' => $topic, 'key' => $key, 'details' => $details , 'type' => $type, 'category' => $category]);       
                  
        return $updatetopic;
    }

    public function topicpublish()
    {
        $loggedinid = Auth::user()->id; 

        $topics = Topic::where('user_id', '=' , $loggedinid)->orderBy('updated_at','desc')->get(['id','user_id','topic','details']);         
                  
        return $topics;
    }

    public function delete(Request $request)
    {
 
        $deleteid = $request->deleteid;

        $topic = Topic::find($deleteid);

        $topic->delete(); 

        return "ok"; 
   
    } 

    public function senddefault(Request $request)
    {

        $loggedinid = Auth::user()->id; 
        $topicid = $request->topicid;

        $topicmails = TopicMail::where('user_id', '=' , $loggedinid)->where('topic_id', '=' , $topicid)->orderBy('updated_at','desc')->get(['id','emailid','created_at']);
                  
        return $topicmails;
   
    } 

    public function send($id ,Request $request)
    {
        $currentmenu = 'topics';

        $topic_key = $id;

        $loggedinid = Auth::user()->id;

        $topics = Topic::where('user_id' , '=' , $loggedinid)->where('key' , '=' , $topic_key)->first(['id','topic','details']); 

        if($topics == null){

        }else{
            return view('send', compact('topics' , 'currentmenu'));    
        }

        
        
    } 

    public function filtered(Request $request)
    {

        $groupinput = $request->group;
        $loggedinid = Auth::user()->id;
        
        $groups = Group::
                where('user_id', '=' , $loggedinid)-> 
                where('name', 'like' , "%$groupinput%")->
                get(['id','name',  'notes']);
                  
        return $groups;
   
    } 

    public function sendmail(Request $request)
    {

        $groupinput = $request->group;
        $topicid = $request->topicid;

        $loggedinid = Auth::user()->id;

        $groups = Group::
                where('user_id', '=' , $loggedinid)-> 
                where('name', '=' , "$groupinput")->
                first(['id']);

        $groupid = $groups->id;
         
        $job = new SendMail($groupid, $topicid);

        $topicmails = TopicMail::where('user_id', '=' , $loggedinid)->where('topic_id', '=' , $topicid)->get(['emailid']);

        $profiles = GroupProfile::where('group_id',$groupid)
            ->where('user_id',$loggedinid)
            ->where('status',1)
            ->whereNotIn('emailid',$topicmails)
            ->get(['emailid','created_at']); 

        $this->dispatch($job);
                  
        return $profiles; 
    } 
}
