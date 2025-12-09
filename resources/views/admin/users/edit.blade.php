@extends('admin.layout')

@section('title', 'Gebruiker bewerken')

@section('content')

<h2 class="text-xl mb-4">Gebruiker bewerken</h2>

<form action="{{ route('admin.users.update', $user) }}" 
      method="POST" 
      enctype="multipart/form-data"
      class="space-y-4">

    @csrf
    @method('PUT')

    <!-- Naam -->
    <div>
        <label class="block">Naam</label>
        <input type="text" name="name" class="border p-2 w-full"
               value="{{ old('name', $user->name) }}" required>
    </div>

    <!-- Email -->
    <div>
        <label class="block">Email</label>
        <input type="email" name="email" class="border p-2 w-full"
               value="{{ old('email', $user->email) }}" required>
    </div>

    <!-- Username -->
    <div>
        <label class="block">Gebruikersnaam</label>
        <input type="text" name="username" class="border p-2 w-full"
               value="{{ old('username', $user->username) }}">
    </div>

    <!-- Birthday -->
    <div>
        <label class="block">Geboortedatum</label>
        <input type="date" name="birthday" class="border p-2"
               value="{{ old('birthday', $user->birthday) }}">
    </div>

    <!-- About Me -->
    <div>
        <label class="block">Over mij</label>
        <textarea name="about_me" class="border p-2 w-full">{{ old('about_me', $user->about_me) }}</textarea>
    </div>

    <!-- Profielfoto -->
    <div>
        <label class="block">Profielfoto</label>
        <input type="file" name="profile_picture" class="border p-2 w-full">

        @if ($user->profile_picture)
            <p class="mt-2">Huidige foto:</p>
            <img src="{{ asset('storage/' . $user->profile_picture) }}"
                 class="w-24 h-24 rounded-full mt-1">
        @endif
    </div>

    <!-- Is Admin -->
    <div>
        <label class="block">Administrator?</label>
        <select name="is_admin" class="border p-2">
            <option value="0" {{ $user->is_admin ? '' : 'selected' }}>Nee</option>
            <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Ja</option>
        </select>
    </div>

    <button type="submit" 
            class="px-4 py-2 bg-blue-600 text-white rounded">
        Bijwerken
    </button>

</form>

@endsection
