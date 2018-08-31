<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Flash;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\UserPaymentProof;
use App\Setting;
use File;

class UserController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('web');
    }

    public function edit()
    {   
        return view('auth.edit', compact('user'));
    }

    public function update(User $user)
    { 
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'institution' => 'required|string',
            'ktp_ktm_number' => 'required|numeric',
            'address' => 'required|string',
            'phone_number' => 'required|numeric',
            'line_id' => 'string',
        ]);

        $current_time = Carbon::now();

        $user->name = request('name');
        $user->email = Auth::user()->email;
        $user->birthday = request('birthday');
        $user->institution = request('institution');
        $user->ktp_ktm_number = request('ktp_ktm_number');
        $user->address = request('address');
        $user->phone_number = request('phone_number');
        $user->line_id = request('line_id');

        $user->save();

        return Redirect::to('/dashboard');    
    }

    public function uploadPhoto()
    {
        return view('auth.upload', compact('user'));
    }

    public function uploadAction(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
        
        $current_time = Carbon::now();
        $type = 'early';
        if ($current_time > Setting::all()->first()) {
            $type = 'normal';
        }

        $proof = UserPaymentProof::where('email', '=', Auth::user()->email)->first();
        if ($proof === null) {
           $proof = new UserPaymentProof();
           $proof->email = Auth::user()->email;
           $proof->receipt_image_file_name = $imageName;
           $proof->save();
        } else {
            $path = public_path('images').'/'.$proof->receipt_image_file_name;
            File::delete($path);
            $proof->receipt_image_file_name = $imageName;
            $proof->save();
        }

        $user = Auth::user();
        $user->registration_type = $type;
        $user->save();

    	return back()
    		->with('success','Image Uploaded successfully.')
            ->with('path',$imageName);
    }

    public function getDashboard() {
        $user = Auth::user();
        if ($user->status === 'accepted') {
            if ($user->seminar_packet === null) {
                return view('dashboard-confirmed');
            } else {
                return view('dashboard-selected');
            }
        } else {
            $proof = UserPaymentProof::where('email', '=', Auth::user()->email)->first();
            if ($proof === null) {
                return view('dashboard-unpaid');
            } else {
                return view('dashboard-pending');
            }
        }
    }

    public function getPayment() {
        $setting = Setting::all()->first();
        $account_number = $setting->account_number;
        $account_name = $setting->account_name;
        $account_bank = $setting->account_bank;
        $early_end_date = $setting->close_early_bird;
        $type;
        $price;
        if (Carbon::now() <= $setting->close_early_bird) {
            $price = $setting->price_early;
            $type = 'early';
        } else {
            $price = $setting->price_normal;
            $type = 'normal';
        }
        return view('dashboard-payment')
        ->with('account_number', $account_number)
        ->with('account_name', $account_name)
        ->with('account_bank', $account_bank)
        ->with('type', $type)
        ->with('price', $price)
        ->with('early_end_date', $early_end_date);
    }
    
}