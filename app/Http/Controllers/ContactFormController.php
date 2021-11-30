<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\Main;

class ContactFormController extends Controller
{

    public function contactView()
    {
        $main = Main::first();
        return view('pages.contact',compact('main'));
    }

    
    public function store()
    {
        //php artisan make:mail ContactFormMail --markdown=contact.contact-form
        //return request()->all();

        $contact_form_data = request()->all();
        Mail::to('naiimabu25@gmail.com')->send(new ContactFormMail($contact_form_data));
        
        return redirect('/')->with('success','Your message has been submitted usccessfully');
    }
}
