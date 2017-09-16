<?php

namespace App\Jobs;

use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Mail\NewMessageMail;

class Newmessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $topic_key;
    protected $topic;
    protected $review;
    protected $user_id;

    public function __construct($topic_key, $topic , $review, $user_id)
    {
        $this->topic_key = $topic_key;
        $this->topic = $topic;
        $this->review = $review;
        $this->user_id = $user_id;
    }


    public function handle()
    {
        $topic_key = $this->topic_key;
        $topic = $this->topic;
        $review = $this->review;
        $user_id = $this->user_id;
        $adminuser = "amitpri@gmail.com";

        $user = User::where('id', $user_id)->first(['email']);

        $email = $user->email;

        \Mail::to($email)->bcc($adminuser)->queue(new NewMessageMail($topic_key,$topic,$review));
    }
}
