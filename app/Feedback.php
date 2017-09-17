<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [

	       'user_id' , 'key' ,'topic_id', 'topic_key', 'topic','profile_id', 'review', 'published'

	    ];


	public function getCreatedAtAttribute($value){

		return date('d M Y',strtotime($value));
		
	}

	public function getReviewAttribute($value){

		return nl2br($value);
		
	}

 	
}
