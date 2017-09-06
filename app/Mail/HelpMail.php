<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class HelpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user_id;
    public $name;
    public $email;
    public $type;
    public $details;

    public function __construct($user_id, $name, $email, $type, $details)
    {
        $this->user_id = $user_id;
        $this->name = $name;
        $this->email = $email;
        $this->type = $type;
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.help');
    }
}
