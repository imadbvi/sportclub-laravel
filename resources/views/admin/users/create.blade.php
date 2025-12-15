@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Nieuwe gebruiker aanmaken
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-6 max-w-lg">
                        @csrf

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Naam</label>
                            <input type="text" name="name"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="email" name="email"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Wachtwoord</label>
                            <input type="password" name="password"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Rol</label>
                            <select name="is_admin"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="0">Gewone Gebruiker</option>
                                <option value="1">Administrator</option>
                            </select>
                            <p class="text-sm text-gray-500 mt-1">Administrators hebben volledige toegang tot het systeem.
                            </p>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.users.index') }}"
                                class="text-gray-600 hover:text-gray-900 mr-4">Annuleren</a>
                            <button type="submit"
                                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                                Gebruiker Aanmaken
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection