<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $topic_key;
    public $topic; 
    public $review; 

    public function __construct($topic_key, $topic, $review)
    {
        $this->topic_key = $topic_key;
        $this->topic = $topic; 
        $this->review = $review;
    }

    public function build()
    { 

        return $this->subject('New Message Recieved')->view('emails.newmessage');
        
    }
}
