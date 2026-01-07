<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::with(['user', 'team'])->latest()->paginate(10);
        return view('admin.registrations.index', compact('registrations'));
    }

    public function reply(Request $request, Registration $registration)
    {
        $request->validate([
            'message' => 'required|string',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $registration->update([
            'status' => $request->status,
            'admin_reply' => $request->message,
            'replied_at' => now(),
        ]);

        \App\Models\ContactMessage::create([
            'user_id' => $registration->user_id,
            'name' => $registration->user->name,
            'email' => $registration->user->email,
            'subject' => 'Update over inschrijving: ' . $registration->team->name,
            'message' => 'Er is een update over je inschrijving.',
            'admin_reply' => "Status update: " . ucfirst($request->status) . "\n\nBericht: " . $request->message,
            'replied_at' => now(),
        ]);


        return back()->with('success', 'Inschrijving bijgewerkt en bericht verstuurd!');
    }
}
