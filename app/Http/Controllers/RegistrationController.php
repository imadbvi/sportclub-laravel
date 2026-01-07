<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    
    public function create()
    {
        $teams = Team::all();
        return view('registrations.create', compact('teams'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'remarks' => 'nullable|string',
        ]);

        Registration::create([
            'user_id' => Auth::id(),
            'team_id' => $request->team_id,
            'remarks' => $request->remarks,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'Je inschrijving is ontvangen!');
    }
}
