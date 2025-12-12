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
                        <h3 class="text-3xl font-bold mb-2">Beheerderspaneel</h3>
                        <p class="text-blue-100">Beheer alle aspecten van de SportClub website.</p>
                    </div>
                    <div class="hidden md:block text-6xl opacity-20">⚙️</div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- Manage News --}}
                <a href="{{ route('news.index') }}"
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
                        <p class="text-gray-600">Plaats, bewerk of verwijder nieuwsberichten.</p>
                    </div>
                </a>

                {{-- Manage FAQ --}}
                <a href="{{ route('faq.index') }}"
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
                        <p class="text-gray-600">Beheer veelgestelde vragen en categorieën.</p>
                    </div>
                </a>

                {{-- Manage Users (Future) --}}
                <div
                    class="bg-white overflow-hidden shadow-md rounded-xl hover:shadow-lg transition duration-300 border-t-4 border-gray-300 opacity-75">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-xl font-bold text-gray-800">Ledenbeheer</h4>
                            <div class="p-2 bg-gray-100 rounded-full">
                                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600">Beheer gebruikers en rollen (Binnenkort).</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection