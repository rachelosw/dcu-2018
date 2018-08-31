<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Mail\ConfirmEmail;
use App\User;
use Illuminate\Support\Facades\Mail;
 
class MailController extends Controller
{
    public function send(User $user)
    {
        $email = $user->email;
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'SenderUserName';
        $objDemo->receiver = 'ReceiverUserName';
 
        Mail::to($email)->send(new ConfirmEmail($objDemo));
    }
}