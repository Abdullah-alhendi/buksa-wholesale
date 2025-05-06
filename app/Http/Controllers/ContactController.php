<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact.form');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // يمكنك هنا إرسال إيميل أو تخزين الرسالة في قاعدة البيانات
        Mail::raw($validated['message'], function ($message) use ($validated) {
            $message->to('admin@example.com')
                    ->subject('رسالة جديدة من: ' . $validated['name'])
                    ->replyTo($validated['email']);
        });

        return back()->with('success', 'تم إرسال رسالتك بنجاح، سنتواصل معك قريباً.');
    }
}
