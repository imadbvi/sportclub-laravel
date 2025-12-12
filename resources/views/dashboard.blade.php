@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-2xl text-blue-900 leading-tight">
        {{ __('Mijn Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Welcome Section --}}
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl mb-8 border-l-4 border-yellow-400">
                <div class="p-8 text-gray-900">
                    <h3 class="text-2xl font-bold mb-2">Welkom terug, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-600">Leuk dat je er weer bent. Hier is een overzicht van je activiteiten.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Profile Card --}}
                <div class="bg-white overflow-hidden shadow-md rounded-xl hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h4 class="ml-4 text-xl font-bold text-gray-800">Mijn Profiel</h4>
                        </div>
                        <p class="text-gray-600 mb-6">Beheer je persoonlijke gegevens, foto en wachtwoord.</p>
                        <a href="{{ route('profile.edit') }}"
                            class="block w-full text-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                            Profiel Bewerken
                        </a>
                    </div>
                </div>

                {{-- Teams Card (Placeholder for now) --}}
                <div class="bg-white overflow-hidden shadow-md rounded-xl hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="ml-4 text-xl font-bold text-gray-800">Mijn Teams</h4>
                        </div>
                        <p class="text-gray-600 mb-6">Bekijk je teamindeling en wedstrijdschema.</p>
                        <button
                            class="block w-full text-center px-4 py-2 bg-gray-100 text-gray-400 font-semibold rounded-lg cursor-not-allowed">
                            Binnenkort beschikbaar
                        </button>
                    </div>
                </div>

                {{-- News Shortcut --}}
                <div class="bg-white overflow-hidden shadow-md rounded-xl hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="ml-4 text-xl font-bold text-gray-800">Laatste Nieuws</h4>
                        </div>
                        <p class="text-gray-600 mb-6">Blijf op de hoogte van de laatste clubupdates.</p>
                        <a href="{{ route('news.index') }}"
                            class="block w-full text-center px-4 py-2 border-2 border-yellow-400 text-yellow-600 font-semibold rounded-lg hover:bg-yellow-400 hover:text-white transition">
                            Naar Nieuws
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection