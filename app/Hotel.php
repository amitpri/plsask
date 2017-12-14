<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
	       'user_id', 'key' , 'id','name' ,  'email1', 'email2', 'email3', 'name', 'phone1', 'phone2', 'phone3', 'city', 'locality', 'address', 'lat', 'long', 'details', 'detailsbyadmin', 'floors', 'rooms', 'checkin', 'checkout', 'parking', 'swimmingpool', 'powerbackup', 'bar', 'hairdryer', 'conferenceroom', 'laundry', 'wheelchair', 'cardaccepted', 'geyser', 'cctv', 'freewifi', 'diningarea', 'gym', 'banquetarea', 'elevator', 'petfriendly', 'inhouserestaurant', 'airportshuttle', 'amenities1', 'amenities2', 'amenities3', 'amenities4', 'amenities5', 'rules1', 'rules2', 'rules3', 'rules4', 'rules5', 'rules6', 'rules7', 'rules8', 'rules9', 'rules10', 'nearby1', 'nearby2', 'nearby3', 'nearby4', 'nearby5', 'nearby6', 'nearby7', 'nearby8', 'nearby9', 'nearby10'
	    ];
}
