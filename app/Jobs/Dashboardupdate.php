<?php

namespace App\Jobs;

use Auth;
use App\User;
use App\Feedback;
use App\Profile;
use App\Topic;
use App\Dashboard;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Dashboardupdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $loggedinid = Auth::user()->id; 

 
        $visittotal = 0;
        $visittoday = 0; 

        $feedbacktotal = Feedback::where('user_id', '=' , $loggedinid)->where('published', '=' , 1)->where('status', '=' , 1)->groupBy('user_id')->count();

        $feedbacktoday = Feedback::whereDate('created_at', '=', date('Y-m-d'))->where('user_id', '=' , $loggedinid)->where('published', '=' , 1)->where('status', '=' , 1)->groupBy('user_id')->count();

        $topics = Topic::where('user_id', '=' , $loggedinid)->groupBy('user_id') 
                ->count();

        $profiles = Profile::where('user_id', '=' , $loggedinid)->groupBy('user_id') 
                ->count();
 
        $dashboards = Dashboard::updateOrCreate([
                        'user_id' => $loggedinid,                        
                    ],
                    [
                        'user_id' => $loggedinid, 
                        'feedbacktotal' => $feedbacktotal,
                        'feedbacktoday' => $feedbacktoday,
                        'visittotal' => $visittotal,
                        'visittoday' => $visittoday,
                        'topics' => $topics,
                        'profiles' => $profiles,
                    ]

                );
    }
}
