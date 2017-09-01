<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupProfile extends Model
{
    protected $fillable = [
	       'user_id','group_id','name','emailid','phone','status'
	    ];
}
