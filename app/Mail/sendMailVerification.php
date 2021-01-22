<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Session;

class sendMailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if(Session::get("language") == "ar")
        {
            return $this->subject("تأكيد بواسطة البريد الالكتروني")->view('mail');
        }else if(Session::get("language") == "fr")
        {
            return $this->subject("vérification de l'E-mail")->view('mail');
        }else if(Session::get("language") == "en")
        {
            return $this->subject("email verification")->view('mail');
        }
    }
}
