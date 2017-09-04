<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function confirm($key)
    {

        $user = User::where('confirmation_code', '=' , $key)->first(['id','confirmed']);
        $error = 0;

 		if(isset($user->id)){

 			if( $user->confirmed == 0 ){

 				$user->confirmed = 1;
 		 		$user->save();

 			}else{
 				
 				$error = 1;
 			} 		 	

 		}else{
 		 		
 		 		$error = 2;

 		}

 		return view('confirm',compact('error'));

    }

    public function viewprofile($id)
    {

    	$currentmenu  = "dashboard";
        $id = $id;

    	return view('viewprofile',compact('currentmenu','id'));

    }

    public function profiledetails(Request $request)
    {
        
        $id = $request->id;
        $user = User::where('id','=',$id)->first(['id','name','email','phone','city','country','company','company_role','details','company_designation','whatsapp','facebook','twitter','linkedin']);

        return $user;

    }
}
