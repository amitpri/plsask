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
}