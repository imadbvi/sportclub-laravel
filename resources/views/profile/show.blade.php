@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->username ?? $user->name }}'s Profiel
        </h2>
        @if(auth()->id() === $user->id)
            <a href="{{ route('profile.edit') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded text-sm hover:bg-blue-700 transition">
                Profiel Bewerken
            </a>
        @endif
    </div>
@endsection

@section('content')
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl">

                {{-- Profile Header / Cover --}}
                <div class="bg-gradient-to-r from-blue-900 to-indigo-800 h-48 relative">
                    <div class="absolute -bottom-16 left-8">
                        @if($user->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->name }}"
                                class="w-32 h-32 rounded-full border-4 border-white object-cover shadow-lg">
                        @else
                            <div
                                class="w-32 h-32 rounded-full border-4 border-white bg-gray-200 flex items-center justify-center text-4xl shadow-lg">
                                👤
                            </div>
                        @endif
                    </div>
                </div>

                <div class="pt-20 px-8 pb-8">

                    {{-- Name & Username --}}
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900">{{ $user->name }}</h1>
                        <p class="text-gray-500 text-lg">{{ '@' . ($user->username ?? 'geen_gebruikersnaam') }}</p>
                    </div>

                    {{-- About Me --}}
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-3">Over mij</h3>
                        @if($user->about_me)
                            <p class="text-gray-600 leading-relaxed">{{ $user->about_me }}</p>
                        @else
                            <p class="text-gray-400 italic">Deze gebruiker heeft nog niets over zichzelf geschreven.</p>
                        @endif
                    </div>

                    {{-- Details Grid --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-semibold text-gray-700">Lid sinds</h4>
                            <p class="text-gray-600">{{ $user->created_at->format('d-m-Y') }}</p>
                        </div>

                        @if($user->birthday)
                            <div>
                                <h4 class="font-semibold text-gray-700">Verjaardag</h4>
                                <p class="text-gray-600">{{ \Carbon\Carbon::parse($user->birthday)->format('d F Y') }}</p>
                            </div>
                        @endif
                    </div>

                    {{-- Teams (To be implemented later) --}}
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-3">Mijn Teams</h3>
                        @if($user->teams && $user->teams->count() > 0)
                            <div class="flex gap-4">
                                @foreach($user->teams as $team)
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold">
                                        {{ $team->name }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">Nog geen teams.</p>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection