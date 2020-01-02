<?php

namespace Kazakevic\ContactUs\Http\Controllers;

use App\Http\Controllers\Controller;
use Kazakevic\ContactUs\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Mail::to(config('mail.from.address'))->send(new ContactUs($request));
        return 'ok';
    }
}
