<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Topic;
use App\TopicMail;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function feedback($key)
    {

        $currentmenu = 'messages';  

        $topicmail = TopicMail::where('mailkey', '=' , $key)->first(['id','topic_id','profile_id','mailkey']);

        $topic = Topic::where('id', $topicmail->topic_id)->where('status', 1)->first(['id','user_id','topic','details']);


        return view('feedback', compact('currentmenu','topic','topicmail'));

    }

    public function feedbackdefault(Request $request)
    {
  
        $user_id = $request->user_id;
        $profile_id = $request->profile_id;
        $topic_id = $request->topic_id;
        $mailkey = $request->mailkey;
        $id = $request->id;

        $feedbacks = TopicMail::where('user_id', '=' , $user_id)->
                            where('profile_id', '=' , $profile_id)->
                            where('topic_id', '=' , $topic_id)-> 
                            where('id', '=' , $id)-> 
                            first(['mailkey']);

        $mailkey2 = $feedbacks->mailkey;

        if( $mailkey2 === $mailkey){
            
            $feedbacks = Feedback::where('user_id', '=' , $user_id)->
                        where('topic_id', '=' , $topic_id)-> 
                        where('profile_id', '=' , $profile_id)->
                        first(['review','published']);

        }      

        return $feedbacks; 

    }

    public function draftfeedback(Request $request)
    {

        $review = $request->review;
        $user_id = $request->user_id;
        $profile_id = $request->profile_id;
        $topic_id = $request->topic_id;
        $topic = $request->topic;
        $mailkey = $request->mailkey;
        $id = $request->id;

        $feedbacks = TopicMail::where('user_id', '=' , $user_id)->
                            where('profile_id', '=' , $profile_id)->
                            where('topic_id', '=' , $topic_id)-> 
                            where('id', '=' , $id)-> 
                            first(['mailkey']);

        $mailkey2 = $feedbacks->mailkey;

        if( $mailkey2 === $mailkey){
            
            $feedbacks = Feedback::updateOrCreate([
                        'user_id' => $user_id,
                        'topic_id' => $topic_id,
                        'profile_id' => $profile_id,
                    ],
                    [
                        'user_id' => $user_id,
                        'topic_id' => $topic_id,
                        'topic' => $topic,
                        'profile_id' => $profile_id,
                        'review' => $review,
                        'published' => 0,
                    ]

                );

        }      
                  
        return "ok"; 

    }

    public function savefeedback(Request $request)
    {
 
        $review = $request->review;
        $user_id = $request->user_id;
        $profile_id = $request->profile_id;
        $topic_id = $request->topic_id;
        $topic = $request->topic;
        $mailkey = $request->mailkey;
        $id = $request->id;

        $feedbacks = TopicMail::where('user_id', '=' , $user_id)->
                            where('profile_id', '=' , $profile_id)->
                            where('topic_id', '=' , $topic_id)-> 
                            where('id', '=' , $id)-> 
                            first(['mailkey']);

        $mailkey2 = $feedbacks->mailkey;

        if( $mailkey2 === $mailkey){
            
            $feedbacks = Feedback::updateOrCreate([
                        'user_id' => $user_id,
                        'topic_id' => $topic_id,
                        'profile_id' => $profile_id,
                    ],
                    [
                        'user_id' => $user_id,
                        'topic_id' => $topic_id,
                        'topic' => $topic,
                        'profile_id' => $profile_id,
                        'review' => $review,
                        'published' => 1,
                    ]

                );

        }      
                  
        return "ok"; 

    }
}
