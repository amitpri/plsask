<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Hotel;
use App\HotelListing;
use Illuminate\Http\Request;

class ListingsController extends Controller
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

        return view('listings', compact('currentmenu','hotel'));
    }

    public function edit(Request $request)
    {
        
        $param = $request->param;
        $val = $request->val;

        $loggedinid = Auth::user()->id; 

        $key = str_random(20);
 
        $hotels = Hotel::updateOrCreate([ 'user_id' => $loggedinid ],['user_id' => $loggedinid, $param => $val]); 
 

    }

    public function save(Request $request)
    {
        
        $loggedinid = Auth::user()->id;  

        $user = User::where('id', '=' , $loggedinid)->first(['key' , 'email']);

        $user_key = $user->key;
        $email = $user->email;


        $room_nos = $request->room_nos;
        $floor = $request->floor;
        $adults = $request->adults;
        $kids = $request->kids;
        $name = $request->roomtype;
        $beds = $request->bedtype;
        $details = $request->details;
        $ac = $request->ac;
        $tv = $request->tv;
        $inroomsafe = $request->inroomsafe;
        $freebreakfast = $request->freebreakfast;
        $minifridge = $request->minifridge;
        $roomheater = $request->roomheater;
        $teamaker = $request->teamaker;
        $freewater = $request->freewater;
        $attachedbathroom = $request->attachedbathroom;
        $amenities1 = $request->amenities1;
        $amenities2 = $request->amenities2;
        $amenities3 = $request->amenities3;
        $amenities4 = $request->amenities4;
        $amenities5 = $request->amenities5;


        $key = str_random(20);
 
        $newroom = HotelListing::create(
                [   'user_id' => $loggedinid, 'key' => $key,'room_nos' => $room_nos, 'floor' => $floor 
                    , 'adults' => $adults , 'kids' => $kids , 'name' => $name , 'beds' => $beds 
                    , 'details' => $details , 'ac' => $ac,'tv' => $tv, 'inroomsafe' => $inroomsafe 
                    , 'freebreakfast' => $freebreakfast , 'minifridge' => $minifridge 
                    , 'roomheater' => $roomheater , 'teamaker' => $teamaker , 'freewater' => $freewater 
                    , 'attachedbathroom' => $attachedbathroom , 'amenities1' => $amenities1 , 'amenities2' => $amenities2 
                    , 'amenities3' => $amenities3 , 'amenities4' => $amenities4 , 'amenities5' => $amenities5 
                ]);    
 

        return $newroom;
 

    }  


    public function active()
    {

        $currentmenu = 'reservations';  
        return view('listingactive', compact('currentmenu'));

    }



}
