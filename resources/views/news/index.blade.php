@extends('layouts.app')

@section('header')
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                Nieuws & Updates
            </h2>
            @if(Auth::check() && Auth::user()->is_admin)
                <a href="{{ route('news.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow transition duration-150 ease-in-out">
                    + Nieuw Bericht
                </a>
            @endif
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
                <div class="bg-white overflow-hidden shadow-lg rounded-lg hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                    
                    {{-- Afbeelding --}}
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
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
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
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
                            <a href="{{ route('news.show', $item) }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm transition-colors">
                                Lees meer &rarr;
                            </a>

                            @if(Auth::check() && Auth::user()->is_admin)
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('news.edit', $item) }}" class="text-gray-400 hover:text-yellow-600 transition-colors" title="Bewerken">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('news.destroy', $item) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit nieuwsbericht wilt verwijderen?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-red-600 transition-colors" title="Verwijderen">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            @endif
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