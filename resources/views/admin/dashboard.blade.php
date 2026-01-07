@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-2xl text-blue-900 leading-tight">
        {{ __('Admin Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-blue-900 text-white overflow-hidden shadow-lg sm:rounded-xl mb-8">
                <div class="p-8 flex justify-between items-center">
                    <div>
                        <h3 class="text-3xl font-bold mb-2">SportClub Beheer</h3>
                        <p class="text-blue-100">Beheer alle aspecten van de SportClub website.</p>
                    </div>
                    <div class="hidden md:block text-6xl opacity-20">⚙️</div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                
                <a href="{{ route('admin.news.index') }}"
                    class="group bg-white overflow-hidden shadow-md rounded-xl hover:shadow-2xl transition duration-300 border-t-4 border-yellow-400">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-xl font-bold text-gray-800">Nieuwsbeheer</h4>
                            <div class="p-2 bg-yellow-100 rounded-full group-hover:bg-yellow-200 transition">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">Beheer al het clubnieuws en updates.</p>
                        <span
                            class="text-yellow-600 font-semibold group-hover:translate-x-1 inline-block transition-transform">Ga
                            naar Nieuwsbeheer &rarr;</span>
                    </div>
                </a>

                
                <a href="{{ route('admin.faqs.index') }}"
                    class="group bg-white overflow-hidden shadow-md rounded-xl hover:shadow-2xl transition duration-300 border-t-4 border-blue-500">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-xl font-bold text-gray-800">FAQ Beheer</h4>
                            <div class="p-2 bg-blue-100 rounded-full group-hover:bg-blue-200 transition">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">Help leden met vragen en antwoorden.</p>
                        <span
                            class="text-blue-600 font-semibold group-hover:translate-x-1 inline-block transition-transform">Ga
                            naar FAQ Beheer &rarr;</span>
                    </div>
                </a>

                
                <a href="{{ route('admin.users.index') }}"
                    class="group bg-white overflow-hidden shadow-md rounded-xl hover:shadow-2xl transition duration-300 border-t-4 border-green-500">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-xl font-bold text-gray-800">Ledenbeheer</h4>
                            <div class="p-2 bg-green-100 rounded-full group-hover:bg-green-200 transition">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">Beheer ledenlijst en admin-rechten.</p>
                        <span
                            class="text-green-600 font-semibold group-hover:translate-x-1 inline-block transition-transform">Ga
                            naar Ledenbeheer &rarr;</span>
                    </div>
                </a>

                
                <a href="{{ route('admin.contact.index') }}"
                    class="group bg-white overflow-hidden shadow-md rounded-xl hover:shadow-2xl transition duration-300 border-t-4 border-purple-500">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-xl font-bold text-gray-800">Berichten</h4>
                            <div class="p-2 bg-purple-100 rounded-full group-hover:bg-purple-200 transition">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">Bekijk ingezonden contactformulieren.</p>
                        <span
                            class="text-purple-600 font-semibold group-hover:translate-x-1 inline-block transition-transform">Bekijk
                            berichten &rarr;</span>
                    </div>
                </a>


                <a href="{{ route('admin.registrations.index') }}"
                    class="group bg-white overflow-hidden shadow-md rounded-xl hover:shadow-2xl transition duration-300 border-t-4 border-red-500">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-xl font-bold text-gray-800">Inschrijvingen</h4>
                            <div class="p-2 bg-red-100 rounded-full group-hover:bg-red-200 transition">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">Beheer inschrijvingen voor teams.</p>
                        <span
                            class="text-red-600 font-semibold group-hover:translate-x-1 inline-block transition-transform">Bekijk
                            inschrijvingen &rarr;</span>
                    </div>
                </a>

            </div>
        </div>
    </div>
@endsection