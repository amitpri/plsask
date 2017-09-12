<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicMail extends Model
{
    protected $fillable = [
	       'user_id', 'key','topic_id','group_id','profile_id','emailid','mailkey',
	    ];

	public function getCreatedAtAttribute($value){

		return date('d M Y',strtotime($value));
		
	}		    
}
