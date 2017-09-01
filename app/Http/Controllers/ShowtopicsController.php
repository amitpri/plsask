<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Feedback;
use Illuminate\Http\Request;

class ShowtopicsController extends Controller
{
    public function index()
    {

        return view('showtopics');
   
    }

    public function default()
    {

        $topics = Topic::where('published', '=' , 1)->where('status', '=' , 1)->where('type', '=' , 'public')->orderBy('updated_at','desc')->get(['id','topic','details']);

        return $topics;
   
    }

    public function filtered(Request $request)
    {

        $topicsinput = $request->topics;
        
        $topics = Topic::
                where('published', '=' , 1)
                ->where('status', '=' , 1)->where('type', '=' , 'public')
                ->where('topic', 'like' , "%$topicsinput%")
                ->get(['id','topic','details']);
                  
        return $topics;
   
    } 

    public function show($id)
    {
 
        $topic = Topic::where('id','=',$id)->first(['id','topic','details','type']);

        return view('showtopic',compact('topic'));
   
    } 

    public function messages(Request $request)
    {   
        $inpid = $request->id;
        $inptopic = $request->topic;

        $topic = Feedback::where('topic_id','=',$inpid)->where('topic','=',$inptopic)->get(['id','topic','review','created_at']); 

        return $topic;
   
    } 

    public function postfeedback(Request $request)
    {   
        $inptopicid = $request->topicid;
        $inptopicname = $request->topicname;
        $inpfeedback = $request->feedback;

        $topic = Topic::where('id','=',$inptopicid)->where('topic','=',$inptopicname)->first(['id','user_id']); 

        $postfeedback = Feedback::create(
                [   
                    'user_id' => $topic->user_id,
                    'topic_id' => $inptopicid,
                    'topic' => $inptopicname,
                    'review' => $inpfeedback,
                    'published' => 1,
                    'status' => 1,                                 
                ]);

        return $postfeedback;
   
    } 

    
}
