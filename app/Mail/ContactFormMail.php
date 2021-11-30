<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact_form_data;

    public function __construct($contact_form_data)
    {
        $this->contact_form_data=$contact_form_data;
    }

   //change .env
    public function build()
    {
        return $this->markdown('contact.contact-form');
    }
}
