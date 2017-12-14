<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $currentmenu = 'reservations';	
        return view('reservations', compact('currentmenu'));

    }
}
