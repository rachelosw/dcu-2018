<?php

namespace App\Mail;

use Illuminate\Support\Facades\Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $register;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($register)
    {
        $this->register = $register;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('rachelcarolinaos@gmail.com')
        ->view('mails.register')
        ->subject('DCU 2018 Registration')
        ->text('mails.register-plain')
        ->with(
          [
                '$name' => $register->name,
          ]);
    }
}
