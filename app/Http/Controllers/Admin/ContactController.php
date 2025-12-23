<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.contact.index', compact('messages'));
    }

    public function show(ContactMessage $contact_message)
    {
        if (!$contact_message->is_read) {
            $contact_message->update(['is_read' => true]);
        }
        return view('admin.contact.show', ['message' => $contact_message]);
    }

    public function destroy(ContactMessage $contact_message)
    {
        $contact_message->delete();

        return redirect()->route('admin.contact.index')->with('success', 'Bericht verwijderd.');
    }

    public function reply(Request $request, ContactMessage $contact_message)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $request->validate([
            'message' => 'required|string',
        ]);

        $contact_message->replies()->create([
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        $contact_message->update([
            'admin_reply' => $request->message,
            'replied_at' => now(),
        ]);

        Mail::to($contact_message->email)->send(new \App\Mail\ContactMessageReply($request->message, $contact_message->subject));

        return back()->with('success', 'Antwoord verzonden!');
    }
}
