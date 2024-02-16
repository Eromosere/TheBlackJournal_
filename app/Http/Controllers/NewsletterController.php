<?php

namespace App\Http\Controllers;

use App\Models\NewsLetter;
use Illuminate\Http\Request;
use App\Mail\NewsletterSubscription;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // validate the request
        $data = $request->validate([
            'email' => 'required|email|string|unique:news_letters,email|max:255'
        ]);

        // save the validated date to the database
        $email = NewsLetter::create($data);

        // Send a confirmation email to the user
        Mail::to($email->email)->send(new NewsletterSubscription($email));

        // return back with success message
        return back()->with('success_message', 'You have successfully subcribed to our newsletter!');
    }
}
