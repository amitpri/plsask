<?php

namespace App\Jobs;

use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\User;
use App\Profile;
use App\GroupProfile;
use App\Topic;
use App\TopicMail;
use App\Mail\MailTopic; 

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $fromid;
    protected $groupid;
    protected $topicid;

    public function __construct( $groupid, $topicid)
    {
        $this->fromid = Auth::user()->id;
        $this->groupid = $groupid;
        $this->topicid = $topicid;
    }

    public function handle()
    {
        $fromid = $this->fromid;
        $groupid = $this->groupid;
        $topicid = $this->topicid;

        $loggedinid = Auth::user()->id;

        $profiles = GroupProfile::where('group_id',$groupid)
            ->where('user_id',$fromid)
            ->where('status',1)
            ->get(['id','emailid']);


        $user = User::where('id', $loggedinid)->first(['id','name']);
        $username = $user->name;

        $topic = Topic::where('user_id',$loggedinid)
            ->where('id',$topicid)
            ->first(['topic','type','details']);

        $topicname = $topic->topic; 
   
        for($i = 0; $i < $profiles->count(); $i++){

            $toemailid = $profiles[$i]->emailid;
            $profileid = $profiles[$i]->id;
            $mailkey = str_random(50);

            $newmail = TopicMail::create(
                [   'user_id' => $loggedinid, 'key' => str_random(20), 'topic_id' => $topicid, 'group_id' => $groupid, 'profile_id' => $profileid, 'emailid' => $toemailid, 'mailkey' => $mailkey,
                ]); 

            \Mail::to($toemailid)->queue(new MailTopic($topicname,$username,$mailkey));

        }
    }
}
