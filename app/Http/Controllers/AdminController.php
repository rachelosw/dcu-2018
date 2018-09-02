<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserPaymentProof;
use App\Seminar;
use App\SeminarCategory;
use App\SeminarPacket;
use App\Setting;
use App\Mail\ConfirmedMail;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        return view('admin');
    }

    public function sendEmail(User $user)
    {
        $obj = new \stdClass();
        $obj->sender = 'DCU Seminar Staff';
        $obj->name = $user->name;
 
        Mail::to($user->email)->send(new ConfirmedMail($obj));
    }

    public function getUsers() {
        $data = User::all();
        $proofs = UserPaymentProof::all();
        return view('admin-users')
        ->with('data', $data)
        ->with('proofs', $proofs);
    }

    public function deleteUser(User $user) {
        User::destroy($user->id);
        return back();
    }

    public function approveUser(User $user) {
        $proof = UserPaymentProof::where('email', $user->email)->first();
        if ($proof != null) {
            $proof->delete();
            $path = public_path('images').'/'.$proof->receipt_image_file_name;
            File::delete($path);
        }
        

        $user->status = 'accepted';
        $user->save();

        $this->sendEmail($user);
        
        return back();
    }

    public function getSeminars() {
        $data = Seminar::all();
        $packet = SeminarPacket::pluck('name');
        return view('admin-seminars')
        ->with('data', $data)
        ->with('packet', $packet);
    }

    public function editSeminar(Seminar $seminar) {
        $categories = SeminarCategory::pluck('category_name');
        return view('admin-seminars-edit')->with('seminar', $seminar)->with('categories', $categories);
    }

    public function addSeminar() {
        $categories = SeminarCategory::pluck('category_name');
        return view('admin-seminars-add')->with('categories', $categories);
    }

    public function seminarAdded(Request $request) {
        $this->validate($request, [
            'seminar_name' => 'required|string|max:255',
            'seminar_category' => 'required',
            'seminar_time' => 'required|date',
            'location' => 'required',
            'speaker' => 'required|string',
            'description' => 'required|string',
            'speaker_photo_image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $seminar = new Seminar;
        $seminar->seminar_name = $request->seminar_name;
        $seminar->seminar_category = $request->seminar_category;
        $seminar->seminar_time = $request->seminar_time;
        $seminar->location = $request->location;
        $seminar->speaker = $request->speaker;
        $seminar->description = $request->description;
        $imageName = time().'.'.$request->speaker_photo_image->getClientOriginalExtension();
        $request->speaker_photo_image->move(public_path('images'), $imageName);
        $seminar->speaker_photo_image = $imageName;
        $seminar->save();

        return Redirect::to('/admin/seminars/');
    }

    public function seminarEdited(Seminar $seminar) {
        $this->validate(request(), [
            'seminar_name' => 'required|string|max:255',
            'seminar_category' => 'required',
            'seminar_time' => 'required|date',
            'location' => 'required',
            'speaker' => 'required|string',
            'description' => 'required|string',
            'speaker_photo_image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $seminar->seminar_name = request('seminar_name');
        $seminar->seminar_category = request('seminar_category');
        $seminar->seminar_time = request('seminar_time');
        $seminar->location = request('location');
        $seminar->speaker = request('speaker');
        $seminar->description = request('description');
        if (request('speaker_photo_image') !== null) {
            if($seminar->speaker_photo_image !== null) {
                $path = public_path('images').'/'.$seminar->speaker_photo_image;
                File::delete($path);
            }
            $imageName = time().'.'.request('speaker_photo_image')->getClientOriginalExtension();
            request('speaker_photo_image')->move(public_path('images'), $imageName);
            $seminar->speaker_photo_image = $imageName;

        }
        if (request('seminar_category') !== 'DCU Opportunities') {
            $seminar->seminar_package = null;
        }
        $seminar->save();
        return Redirect::to('/admin/seminars/');
    }

    public function deleteSeminar(Seminar $seminar) {
        Seminar::destroy($seminar->id);
        return back();
    }

    public function seminarCategories() {
        $data = SeminarCategory::all();
        return view('admin-seminar-categories')->with('data', $data);
    }

    public function editCategory(SeminarCategory $category) {
        return view('admin-categories-edit')->with('category', $category);
    }

    public function categoryEdited(SeminarCategory $category) {
        $this->validate(request(), [
            'description' => 'required|string'
        ]);
        $category->description = request('description');
        $category->save();
        return back();
    }

    public function changeSeminarPacket(Seminar $seminar) {
        $seminar->seminar_package = request('packet');
        $seminar->save();
        return back();
    }

    public function getSettingsPage() {
        $data = Setting::all()->first();
        return view('admin-settings')->with('data', $data);
    }

    public function saveSettings(Request $request) {
        $this->validate($request, [
            'account_name' => 'required|string',
            'account_bank' => 'required|string',
            'account_number' => 'required|numeric',
            'open_registration' => 'required|date',
            'close_early_bird' => 'required|date',
            'close_registration' => 'required|date',
            'price_normal' => 'required|numeric',
            'price_early' => 'required|numeric',
            'price_student_early' => 'required|numeric',
            'price_student_normal' => 'required|numeric',
        
        ]);
        $setting = Setting::all()->first();
        if ($setting === null) {
            $setting = new Setting;
        }
        $setting->price_student_early = $request->price_student_early;
        $setting->price_student_normal = $request->price_student_normal;
        $setting->account_name = $request->account_name;
        $setting->account_bank = $request->account_bank;
        $setting->account_number = $request->account_number;
        $setting->open_registration = $request->open_registration;
        $setting->close_early_bird = $request->close_early_bird;
        $setting->close_registration = $request->close_registration;
        $setting->price_normal = $request->price_normal;
        $setting->price_early = $request->price_early;
        $setting->save();
        return back();
    }
    
 }
