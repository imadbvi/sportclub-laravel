<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

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

            'password' => bcrypt($request->password),

            'is_admin' => $request->is_admin === "1" ? 1 : 0,

            'username' => null,
            'birthday' => null,
            'profile_picture' => null,
            'about_me' => null,
        ]);

        return redirect()->route('admin.users.index')
                         ->with('success', 'Nieuwe gebruiker succesvol aangemaakt.');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validatie
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'username' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'about_me' => 'nullable|string',
            'profile_picture' => 'nullable|image|max:2048',
            'is_admin' => 'required|boolean',
        ]);

        // Update tekstvelden
        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'birthday' => $request->birthday,
            'about_me' => $request->about_me,
            'is_admin' => $request->is_admin,
        ]);

        // Profielfoto uploaden
        if ($request->hasFile('profile_picture')) {

            if ($user->profile_picture && \Storage::disk('public')->exists($user->profile_picture)) {
                \Storage::disk('public')->delete($user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->save();

        return redirect()->route('admin.users.index')
            ->with('success', 'Gebruiker succesvol bijgewerkt.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')
                         ->with('success', 'Gebruiker verwijderd.');
    }
}
