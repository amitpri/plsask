<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Mail\Registration; 

class Newregistration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $tomail;
    protected $name;
    protected $confirmation_code;

    public function __construct($tomail, $name , $confirmation_code)
    {
        $this->tomail = $tomail;
        $this->name = $name;
        $this->confirmation_code = $confirmation_code;
        
    } 

    public function handle()
    {
        
        $tomail = $this->tomail;
        $name = $this->name;
        $confirmation_code = $this->confirmation_code;
        
        \Mail::to($tomail)->send(new Registration($name,$confirmation_code));
    }
}
