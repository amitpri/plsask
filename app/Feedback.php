<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
   protected $fillable = [
	       'user_id','topic_id','topic','profile_id','review','published'
	    ];
}
