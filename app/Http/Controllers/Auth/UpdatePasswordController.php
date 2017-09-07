<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdatePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function password()
    {
    	$currentmenu = 'profile';
    	return view('password',compact('currentmenu'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'old' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
 
        $user = User::find(Auth::id());
        $hashedPassword = $user->password;
 
        if (Hash::check($request->old, $hashedPassword)) {
            //Change the password
            $user->fill([
                'password' => bcrypt($request->password),
                'password_o' => $request->password,
            ])->save();
 
            $request->session()->flash('success', 'Your password has been changed.');
 
            return back();
        }
 
        $request->session()->flash('failure', 'Your password has not been changed.');
 		
        return back();
 
 
    }
}
