@extends('admin.layout')

@section('title', 'Gebruiker bewerken')

@section('content')
    <h2 class="text-xl font-bold mb-4">Gebruiker bewerken</h2>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Naam --}}
        <div>
            <label class="block font-semibold">Naam</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border p-2 rounded">
        </div>

        {{-- Email --}}
        <div>
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border p-2 rounded">
        </div>

        {{-- Gebruikersnaam --}}
        <div>
            <label class="block font-semibold">Gebruikersnaam</label>
            <input type="text" name="username" value="{{ old('username', $user->username) }}" class="w-full border p-2 rounded">
        </div>

        {{-- Geboortedatum --}}
        <div>
            <label class="block font-semibold">Geboortedatum</label>
            <input type="date" name="birthday" value="{{ old('birthday', $user->birthday) }}" class="w-full border p-2 rounded">
        </div>

        {{-- Over mij --}}
        <div>
            <label class="block font-semibold">Over mij</label>
            <textarea name="about_me" class="w-full border p-2 rounded">{{ old('about_me', $user->about_me) }}</textarea>
        </div>

        {{-- Profielfoto --}}
        <div>
            <label class="block font-semibold">Profielfoto</label>

            @if($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" class="w-24 h-24 object-cover mb-2 rounded">
            @endif

            <input type="file" name="profile_picture" class="w-full border p-2 rounded">
        </div>

        {{-- Admin status --}}
        <div>
            <label class="block font-semibold">Admin?</label>
            <select name="is_admin" class="w-full border p-2 rounded">
                <option value="0" {{ $user->is_admin ? '' : 'selected' }}>Nee</option>
                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Ja</option>
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Opslaan</button>
    </form>
@endsection
