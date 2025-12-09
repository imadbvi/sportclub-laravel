@extends('admin.layout')

@section('title', 'Nieuwe gebruiker')

@section('content')
    <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold">Naam</label>
            <input type="text" name="name" class="border p-2 w-full">
        </div>

        <div>
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" class="border p-2 w-full">
        </div>

        <div>
            <label class="block font-semibold">Wachtwoord</label>
            <input type="password" name="password" class="border p-2 w-full">
        </div>

        <div>
            <label class="block font-semibold">Admin?</label>
            <select name="is_admin" class="border p-2 w-full">
                <option value="0">Nee</option>
                <option value="1">Ja</option>
            </select>
        </div>

        <button class="px-4 py-2 bg-green-600 text-white rounded">
            Aanmaken
        </button>
    </form>
@endsection
