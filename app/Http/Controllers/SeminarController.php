<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Seminar;
use App\SeminarCategory;
use App\SeminarPacket;
use App\User;
use App\Mail\FinishedMail;

class SeminarController extends Controller
{

    public function sendEmail(User $user)
    {
        $obj = new \stdClass();
        $obj->sender = 'DCU Seminar Staff';
        $obj->name = $user->name;
 
        Mail::to($user->email)->send(new FinishedMail($obj));
    }

    public function getChooseSeminarView() {
        $package = SeminarPacket::all();
        $seminarA = Seminar::where('seminar_package', 'A')->orderBy('seminar_time', 'asc')->get();
        $seminarB = Seminar::where('seminar_package', 'B')->orderBy('seminar_time', 'asc')->get();
        $seminarC = Seminar::where('seminar_package', 'C')->orderBy('seminar_time', 'asc')->get();
        $seminarD = Seminar::where('seminar_package', 'D')->orderBy('seminar_time', 'asc')->get();
        return view('auth.seminar-package')
        ->with('packages', $package)
        ->with('seminarA', $seminarA)
        ->with('seminarB', $seminarB)
        ->with('seminarC', $seminarC)
        ->with('seminarD', $seminarD);
    }

    public function setSeminar(SeminarPacket $package) {
        $user = Auth::user();
        $user->seminar_packet = $package->name;
        $user->save();
        $package->registrant++;
        $package->save();
        if ($package->registrant >= $package->quota) {
            $package->isClosed = true;
            $package->save();
        }

        $this->sendEmail($user);

        return Redirect::to('/dashboard');
    }

    public function getDcuInspiration() {
        $category = SeminarCategory::where('category_name', 'DCU Inspiration')->first();
        $seminars = Seminar::where('seminar_category', 'DCU Inspiration')->orderBy('seminar_time', 'asc')->get();
        return view('dcu-seminars')
        ->with('category', $category)
        ->with('seminars', $seminars);

    }

    public function getDcuOpportunities() {
        $category = SeminarCategory::where('category_name', 'DCU Opportunity')->first();
        $seminars = Seminar::where('seminar_category', 'DCU Opportunity')->orderBy('seminar_time', 'asc')->get();
        return view('dcu-seminars')
        ->with('category', $category)
        ->with('seminars', $seminars);

    }

    public function getDcuSpecials() {
        $category = SeminarCategory::where('category_name', 'DCU Specials')->first();
        $seminars = Seminar::where('seminar_category', 'DCU Specials')->orderBy('seminar_time', 'asc')->get();
        return view('dcu-seminars')
        ->with('category', $category)
        ->with('seminars', $seminars);

    }

    public function getDcuCare() {
        $category = SeminarCategory::where('category_name', 'DCU Care')->first();
        $seminars = Seminar::where('seminar_category', 'DCU Care')->orderBy('seminar_time', 'asc')->get();
        return view('dcu-seminars')
        ->with('category', $category)
        ->with('seminars', $seminars);
    }
}
