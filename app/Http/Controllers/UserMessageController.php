<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContactMessage;

class UserMessageController extends Controller
{
    public function index()
    {
        $messages = auth()->user()->contactMessages()->latest()->paginate(10);
        return view('user.messages.index', compact('messages'));
    }

    public function show(ContactMessage $message)
    {
        if ($message->user_id !== auth()->id()) {
            abort(403);
        }

        return view('user.messages.show', compact('message'));
    }

    public function reply(Request $request, ContactMessage $message)
    {
        if ($message->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'message' => 'required|string',
        ]);

        $message->replies()->create([
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        $message->update(['is_read' => false]);

        return back()->with('success', 'Reactie verstuurd!');
    }
}
