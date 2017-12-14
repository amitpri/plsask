<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $currentmenu = 'reservations';	
        return view('reviews', compact('currentmenu'));

    }
}
