@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Gebruiker bewerken: {{ $user->name }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6 grayscale-0">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Linkerkolom: Persoonsgegevens --}}
                            <div class="space-y-4">
                                <h3 class="text-lg font-medium text-gray-900">Persoonsgegevens</h3>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700">Naam</label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700">Email</label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700">Gebruikersnaam
                                        (Optioneel)</label>
                                    <input type="text" name="username" value="{{ old('username', $user->username) }}"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700">Geboortedatum</label>
                                    <input type="date" name="birthday" value="{{ old('birthday', $user->birthday) }}"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </div>
                            </div>

                            {{-- Rechterkolom: Profiel & Rechten --}}
                            <div class="space-y-4">
                                <h3 class="text-lg font-medium text-gray-900">Profiel & Rechten</h3>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700">Over mij</label>
                                    <textarea name="about_me" rows="4"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('about_me', $user->about_me) }}</textarea>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700">Admin Rechten</label>
                                    <div class="mt-2 p-4 border rounded-md bg-gray-50">
                                        <div class="flex items-center">
                                            <input type="radio" id="role_user" name="is_admin" value="0"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" {{ !$user->is_admin ? 'checked' : '' }}>
                                            <label for="role_user" class="ml-3 block text-sm font-medium text-gray-700">
                                                Gewone Gebruiker
                                            </label>
                                        </div>
                                        <div class="flex items-center mt-2">
                                            <input type="radio" id="role_admin" name="is_admin" value="1"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" {{ $user->is_admin ? 'checked' : '' }}>
                                            <label for="role_admin" class="ml-3 block text-sm font-medium text-gray-700">
                                                Administrator (Volledige toegang)
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700">Huidige Profielfoto</label>
                                    @if($user->profile_picture)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                                class="w-20 h-20 object-cover rounded-full border border-gray-200">
                                        </div>
                                    @else
                                        <p class="text-sm text-gray-500 mt-1">Geen foto</p>
                                    @endif
                                    <input type="file" name="profile_picture"
                                        class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                </div>

                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-4">
                            <a href="{{ route('admin.users.index') }}"
                                class="text-gray-600 hover:text-gray-900 mr-4">Annuleren</a>
                            <button type="submit"
                                class="px-6 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">
                                Opslaan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection