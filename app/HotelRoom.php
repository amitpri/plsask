<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    protected $fillable = [
	       'user_id', 'key' , 'user_id', 'hotel_id', 'room_nos', 'floor', 'name', 'adults', 'kids', 'beds', 'details', 'detailsbyadmin', 'ac', 'tv', 'inroomsafe', 'freebreakfast', 'minifridge', 'roomheater', 'teamaker', 'freewater', 'attachedbathroom', 'amenities1', 'amenities2', 'amenities3', 'amenities4', 'amenities5', 'admin_status'
	    ];
}
