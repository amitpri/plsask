<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Feedback;
use Illuminate\Http\Request;

class ShowreviewsController extends Controller
{
    public function index()
    {

        return view('showreviews');
   
    }

    public function default()
    {

        $feedbacks = Feedback::where('published', '=' , 1)->where('status', '=' , 1)->orderBy('updated_at','desc')->get(['id','topic_id','topic','review']);

        return $feedbacks;
   
    }

    public function filtered(Request $request)
    {

        $feedbackinput = $request->review;
        
        $feedbacks = Feedback::
                where('published', '=' , 1)
                ->where('status', '=' , 1)
                ->where('review', 'like' , "%$feedbackinput%")
                ->get(['id','topic_id','topic','review']);
                  
        return $feedbacks;
   
    } 
}
