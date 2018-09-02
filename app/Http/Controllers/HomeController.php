<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::all()->first();
        $close_registration = $setting->close_registration;
        $countdown_day = Carbon::now()->diffInDays($close_registration, false);
        return view('home')
        ->with('close_date', $setting->close_registration)
        ->with('close_early', $setting->close_early_bird)
        ->with('price_early', $setting->price_early)
        ->with('price_normal', $setting->price_normal)
        ->with('price_student_early', $setting->price_student_early)
        ->with('price_student_normal', $setting->price_student_normal)
        ->with('countdown', $countdown_day);
    }
}
