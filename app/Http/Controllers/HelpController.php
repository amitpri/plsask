<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Help;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index()
    {

        if(Auth::user())
		{
		     $loggedinid = Auth::user()->id;
		     $users = User::where('id' , '=' , $loggedinid)->first(['id','name','email']);  

		     return view('help',compact('users'));

		}else{

			return view('help');

		}		
   
    }

    public function submit(Request $request)
    {

        $inpname = $request->name;
        $inpemail = $request->email;
        $inptype = $request->type;
        $inpdetails = $request->details; 

		if(Auth::user())
		{
		     $loggedinid = Auth::user()->id;

		}else{

			$loggedinid = 0;

		} 

        $help = Help::create(
                [   
                    'user_id' => $loggedinid,
                    'name' => $inpname,
                    'emailid' => $inpemail,
                    'type' => $inptype,
                    'details' => $inpdetails,                              
                ]);

        return "ok";
   
    }
}
