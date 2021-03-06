<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Setting;
use App\Mail\RegisterMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

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
            'birthday' => 'required|date',
            'institution' => 'required|string',
            'ktp_ktm_number' => 'required|numeric',
            'address' => 'required|string',
            'phone_number' => 'required|numeric',
            'line_id' => 'required|string',
            'type' => User::DEFAULT_TYPE,  
            'captcha' => 'required|captcha', 
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birthday' => $data['birthday'],
            'institution' => $data['institution'],
            'ktp_ktm_number' => $data['ktp_ktm_number'],
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
            'line_id' => $data['line_id'],
        ]);
        $this->sendEmail($user);
        return $user;
    }

    public function sendEmail(User $user)
    {
        $obj = new \stdClass();
        $obj->sender = 'DCU Seminar Staff';
        $obj->name = $user->name;
 
        Mail::to($user->email)->send(new RegisterMail($obj));
    }
}
