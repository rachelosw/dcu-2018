<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $confirmation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($confirmation)
    {
        $this->confirmation = $confirmation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('rachelcarolinaos@gmail.com')
        ->view('mails.confirmation')
        ->subject('DCU 2018 Payment Confirmation')
        ->text('mails.confirmation-plain');
    }
}
