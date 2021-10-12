<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        $client = new \GuzzleHttp\Client(['http_errors' => false]);
        request()->validate(['email' => 'required|email']);
        try {

            $newsletter->subscribe(request('email'));
        } catch (ValidationException $e) {
            ValidationException::withMessages([
                'email' => 'Error adding email... try again.'
            ]);
        }

        return redirect('/')->with('success', 'You are now signed up for our newsletter.');
    }
}
