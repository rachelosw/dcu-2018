<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FinishedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $finish;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($finish)
    {
        $this->finish = $finish;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('rachelcarolinaos@gmail.com')
        ->view('mails.finished')
        ->subject('DCU 2018 - Thank you for completing your registration')
        ->text('mails.finished-plain')
        ->attach(public_path('/file').'/PROPEKS_rundown.pdf', [
            'as' => 'rundown.pdf',
            'mime' => 'pdf',
    ]);;
    }
}
