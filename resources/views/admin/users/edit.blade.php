@extends('admin.layout')

@section('title', 'Gebruiker bewerken')

@section('content')
    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Naam</label>
            <input type="text" name="name" value="{{ $user->name }}" class="border p-2 w-full">
        </div>

        <div>
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="border p-2 w-full">
        </div>

        <div>
            <label class="block font-semibold">Admin?</label>
            <select name="is_admin" class="border p-2 w-full">
                <option value="0" {{ $user->is_admin ? '' : 'selected' }}>Nee</option>
                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Ja</option>
            </select>
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded">
            Opslaan
        </button>
    </form>
@endsection
