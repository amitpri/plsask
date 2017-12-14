<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Hotel;
use App\HotelRoom;

use Illuminate\Http\Request;

class HotelRoomsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $currentmenu = 'hotel';

        return view('hotelrooms', compact('currentmenu'));
    }

    public function get()
    {

        $loggedinid = Auth::user()->id; 

        $rooms = HotelRoom::where('user_id', '=' , $loggedinid)->orderBy('updated_at','desc')->get(['id','key' , 'user_id', 'hotel_id', 'room_nos','floor' ,'name', 'adults', 'kids', 'beds', 'details', 'detailsbyadmin', 'ac', 'tv', 'inroomsafe', 'freebreakfast', 'minifridge', 'roomheater', 'teamaker', 'freewater', 'attachedbathroom', 'amenities1', 'amenities2', 'amenities3', 'amenities4', 'amenities5', 'admin_status' ]);         
                  
        return $rooms;

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
 
        $newroom = HotelRoom::create(
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


    public function list($key)
    {

        $currentmenu = 'hotel';

        $loggedinid = Auth::user()->id;

        $hotelrooms = HotelRoom::where('key', '=' , $key)->where('user_id', '=' , $loggedinid)->first(['id','key' , 'user_id', 'hotel_id', 'room_nos','floor' ,'name', 'adults', 'kids', 'beds', 'details', 'detailsbyadmin', 'ac', 'tv', 'inroomsafe', 'freebreakfast', 'minifridge', 'roomheater', 'teamaker', 'freewater', 'attachedbathroom', 'amenities1', 'amenities2', 'amenities3', 'amenities4', 'amenities5', 'admin_status' ]);

        return view('hotelroomlisting', compact('hotelrooms','currentmenu'));
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
