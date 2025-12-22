@extends('layouts.app')

@section('header')
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                Nieuws & Updates
            </h2>
        </div>
    </div>
@endsection

@section('content')
    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($news as $item)
                    <div
                        class="bg-white overflow-hidden shadow-lg rounded-lg hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">

                        {{-- Afbeelding --}}
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400 text-4xl">📰</span>
                            </div>
                        @endif

                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                {{-- Datum --}}
                                @if($item->published_at)
                                    <div class="flex items-center text-sm text-gray-500 mb-2">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        {{ $item->published_at->format('d M Y') }}
                                    </div>
                                @endif

                                {{-- Titel --}}
                                <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                                    {{ $item->title }}
                                </h3>

                                {{-- Korte inhoud --}}
                                <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                                    {{ Str::limit($item->content, 120) }}
                                </p>
                            </div>

                            <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                                <a href="{{ route('news.show', $item) }}"
                                    class="text-blue-600 hover:text-blue-800 font-semibold text-sm transition-colors">
                                    Lees meer &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($news->isEmpty())
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">Er zijn nog geen nieuwsberichten geplaatst.</p>
                </div>
            @endif
        </div>
    </div>
@endsection