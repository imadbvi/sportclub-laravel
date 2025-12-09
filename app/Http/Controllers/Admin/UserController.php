<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // <-- BELANGRIJK

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create'); // straks maken we deze view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'is_admin' => 'required',
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
    
            
            'password' => $request->password,
    
            
            'is_admin' => $request->is_admin === "1" ? 1 : 0,
    
            
            'username' => null,
            'birthday' => null,
            'profile_picture' => null,
            'about_me' => null,
        ]);
    
        return redirect()->route('admin.users.index')
                         ->with('success', 'Nieuwe gebruiker succesvol aangemaakt.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->is_admin,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Gebruiker verwijderd.');
    }
}
