<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewTopicMail extends Mailable
{
    use Queueable, SerializesModels;

    public $key;
    public $topic; 

    public function __construct($key, $topic)
    {
        $this->key = $key;
        $this->topic = $topic; 
    }
 
    public function build()
    {
        return $this->subject('New Topic Published')->view('emails.newtopic');
    }
}
