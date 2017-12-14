<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Hotel;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $currentmenu = 'hotel';

        $loggedinid = Auth::user()->id;    
  
        $hotel = Hotel::where('user_id','=',$loggedinid)->first(['id','name' ,  'email1', 'email2', 'email3', 'name', 'phone1', 'phone2', 'phone3', 'city', 'locality', 'address', 'lat', 'long', 'details', 'detailsbyadmin', 'floors', 'rooms', 'checkin', 'checkout', 'parking', 'swimmingpool', 'powerbackup', 'bar', 'hairdryer', 'conferenceroom', 'laundry', 'wheelchair', 'cardaccepted', 'geyser', 'cctv', 'freewifi', 'diningarea', 'gym', 'banquetarea', 'elevator', 'petfriendly', 'inhouserestaurant', 'airportshuttle', 'amenities1', 'amenities2', 'amenities3', 'amenities4', 'amenities5', 'rules1', 'rules2', 'rules3', 'rules4', 'rules5', 'rules6', 'rules7', 'rules8', 'rules9', 'rules10', 'nearby1', 'nearby2', 'nearby3', 'nearby4', 'nearby5', 'nearby6', 'nearby7', 'nearby8', 'nearby9', 'nearby10']);  

        return view('hotel', compact('currentmenu','hotel'));
    }

    public function edit(Request $request)
    {
        
        $param = $request->param;
        $val = $request->val;

        $loggedinid = Auth::user()->id; 

        $key = str_random(20);
 
        $hotels = Hotel::updateOrCreate([ 'user_id' => $loggedinid ],['user_id' => $loggedinid, $param => $val]); 
 

    } 



}
