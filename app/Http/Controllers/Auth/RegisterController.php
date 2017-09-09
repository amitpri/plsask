<?php

namespace App\Http\Controllers\Auth;

use App\User;

use Illuminate\Support\Facades\Input;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Jobs\Newregistration;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|min:10',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        $tomail = $data['email'];
        $name = $data['name'];
        $confirmation_code = str_random(30);
        $key = str_random(20);
          
        $this->dispatch(new Newregistration($tomail, $name, $confirmation_code));

        return User::create([
            'key' => $key,
            'name' => $name,
            'email' => $tomail,
            'password' => bcrypt($data['password']),
            'password_o' => $data['password'],
            'phone' => $data['phone'],
            'confirmation_code' => $confirmation_code,
        ]);



        
    }
}
