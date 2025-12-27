<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|in:support,sales,partnership,feedback,other',
            'message' => 'required|string|min:10|max:5000',
        ]);

        // Log the contact submission (or send email)
        // For now, just log to storage
        \Log::info('Contact form submission', $validated);

        // You can also send email here:
        // Mail::send('emails.contact', $validated, function ($message) use ($validated) {
        //     $message->to('support@isubyo.com')
        //             ->from($validated['email'])
        //             ->subject('New Contact Form Submission: ' . $validated['subject']);
        // });

        return redirect()->route('pages.contact')
            ->with('success', 'Thank you for contacting us! We\'ll get back to you soon.');
    }
}
