<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ShowtopicsController extends Controller
{
    public function index()
    {

        return view('showtopics');
   
    }

    public function default()
    {

        $topics = Topic::where('published', '=' , 1)->where('admin_status', '=' , 1)->where('status', '=' , 1)->where('type', '=' , 'public')->orderBy('updated_at','desc')->take(10)->get(['id','key','user_id','topic','name' , 'user_key']);

        return $topics;
   
    }

    public function getmore(Request $request)
    {

        $row_count = $request->row_count;

        $topics = Topic::where('published', '=' , 1)->where('status', '=' , 1)->where('type', '=' , 'public')->orderBy('updated_at','desc')->offset($row_count)->take(10)->get(['id','key','user_id','topic','name', 'user_key']);

        return $topics;
   
    }

    public function filtered(Request $request)
    {

        $topicsinput = $request->topics;
        
        $topics = Topic::
                where('published', '=' , 1)
                ->where('status', '=' , 1)->where('type', '=' , 'public')
                ->where('topic', 'like' , "%$topicsinput%")
                ->take(10)
                ->get(['id','key','topic','details' , 'name', 'user_key']);
                  
        return $topics;
   
    } 

    public function show($key)
    {
 
        $topic = Topic::where('admin_status','=',1)->where('status','=',1)->where('key','=',$key)->where('type','=','public')->first(['id', 'key' ,'topic']);


        if($topic == null){
            
        }else{
            return view('showtopic',compact('topic'));    
        }

        
   
    } 

    public function showdetails(Request $request)
    {
 
        $id = $request->id; 

        $topic = Topic::where('id','=',$id)->where('type','=','public')->first(['id','topic','details','type','user_id','name', 'user_key']);
        
        return $topic;
    }

    public function messages(Request $request)
    {   
        $inpid = $request->id; 

        $topic = Feedback::where('topic_id','=',$inpid)->get(['id','topic','review','created_at']); 

        return $topic;
   
    } 

    public function postfeedback(Request $request)
    {   
        $inptopicid = $request->topicid;
        $inptopickey = $request->topickey;
        $inptopicname = $request->topicname;
        $inpfeedback = $request->feedback;

        $topic = Topic::where('id','=',$inptopicid)->where('key','=',$inptopickey)->where('topic','=',$inptopicname)->first(['id','user_id']); 

        $userid = $topic->user_id;
        $key = str_random(20);

        $postfeedback = Feedback::create(
                [   
                    'user_id' => $userid,
                    'key' => $key,
                    'topic_id' => $inptopicid,
                    'topic_key' => $inptopickey,
                    'topic' => $inptopicname,
                    'review' => $inpfeedback,
                    'published' => 1,
                    'status' => 1,                                 
                ]);

        $publishdata = [

            'event' => "NewFeedback_$userid",
            'data' => [
                'topic_id' => $inptopicid,
                'topic' => $inptopicname,
                'review' => $inpfeedback,
            ]
            
        ]; 

        Redis::publish('channel_feedback',json_encode($publishdata));

        return $postfeedback;
   
    } 

    
}
