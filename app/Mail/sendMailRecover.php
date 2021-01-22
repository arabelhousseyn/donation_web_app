<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Session;
class sendMailRecover extends Mailable
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
            return $this->subject("إستعادة كلمة المرور")->view('recover');
        }else if(Session::get("language") == "fr")
        {
            return $this->subject("récupérer mot de passe")->view('recover');
        }else if(Session::get("language") == "en")
        {
            return $this->subject("recover password")->view('recover');
        }
    }
}
