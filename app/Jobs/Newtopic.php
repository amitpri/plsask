<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Mail\NewTopicMail; 

class Newtopic implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $key;
    protected $topic;
    protected $email;

    public function __construct($key, $topic , $email)
    {
        $this->key = $key;
        $this->topic = $topic;
        $this->email = $email;
    }

    public function handle()
    {
        
        $key = $this->key;
        $topic = $this->topic;
        $email = $this->email;
        $adminuser = "amitpri@gmail.com";

        \Mail::to($email)->bcc($adminuser)->queue(new NewTopicMail($key,$topic));
    }
}
