<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $fillable = [
	       'user_id','feedbacktotal','feedbacktoday','visittotal','visittoday','topics','profiles'
	    ];
}
