<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    protected $fillable = [
	       'user_id','name','emailid','type','details'
	    ];
}
