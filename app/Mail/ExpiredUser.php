<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExpiredUser extends Mailable
{
    use Queueable, SerializesModels;
    public $expireData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($expireData)
    {
        $this->expireData = $expireData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from SmartVCard')
        ->view('Email.expire');
    }
}
