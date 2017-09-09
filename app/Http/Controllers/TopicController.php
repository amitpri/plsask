<?php

namespace App\Http\Controllers;

use Auth;
use App\Topic;
use App\Profile;
use App\Group;
use App\TopicMail;
use App\Mail\MailTopic;

use Illuminate\Http\Request;
use App\Jobs\SendMail;

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

        $topics = Topic::where('user_id', '=' , $loggedinid)->orderBy('updated_at','desc')->get(['id','key','user_id','topic','type','details']);         
                  
        return $topics;
    }

    public function savetopic(Request $request)
    {
        $loggedinid = Auth::user()->id; 
        $loggedinname = Auth::user()->name;

        $topic = $request->topic;
        $details = $request->details;
        $type = $request->type;
        $key = str_random(20);

        $newtopic = Topic::create(
                [   'user_id' => $loggedinid, 'key' => $key,'name' => $loggedinname,  'topic' => $topic, 'type' => $type, 'details' => $details, 
                ]);        
                  
        return $newtopic;
    }

    public function saveedittopic(Request $request)
    {
        $loggedinid = Auth::user()->id; 

        $topic = $request->topic;
        $details = $request->details;
        $type = $request->type;
        $key = str_random(20);
        $id = $request->id; 

        $updatetopic = Topic::updateOrCreate([ 'user_id' => $loggedinid, 'id' => $id  ],['topic' => $topic, 'key' => $key, 'details' => $details , 'type' => $type]);       
                  
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

        $topicmails = TopicMail::where('user_id', '=' , $loggedinid)->where('topic_id', '=' , $topicid)->orderBy('updated_at','desc')->get(['id','emailid','updated_at']);
                  
        return $topicmails;
   
    } 

    public function send($id ,Request $request)
    {
        $currentmenu = 'topics';

        $topicid = $id;

        $loggedinid = Auth::user()->id;

        $topics = Topic::where('user_id' , '=' , $loggedinid)->where('id' , '=' , $topicid)->first(['id','topic','details']);        
        return view('send', compact('topics' , 'currentmenu'));
        
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

        $this->dispatch($job);
   
    } 
}
