<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Contact extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Requests\ContactFormRequest $contactFormRequest)
    {
        return \Redirect::route('contact')
            ->with('message', 'Thank you for contacting me!');
    }
}
