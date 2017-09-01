<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailTopic extends Mailable
{
    use Queueable, SerializesModels;

    public $topicname;
    public $username;
    public $mailkey;

    public function __construct($topicname, $username, $mailkey)
    {
        $this->topicname = $topicname;
        $this->username = $username;
        $this->mailkey = $mailkey;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.topics');
    }
}
