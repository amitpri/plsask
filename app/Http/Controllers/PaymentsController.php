<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $currentmenu = 'reservations';	
        return view('payments', compact('currentmenu'));

    }
}
