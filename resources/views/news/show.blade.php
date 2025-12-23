@extends('layouts.app')

@section('content')
    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ route('news.index') }}"
                    class="inline-flex items-center text-gray-500 hover:text-gray-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Terug naar overzicht
                </a>
            </div>

            <article class="bg-white shadow-xl rounded-2xl overflow-hidden">

                {{-- Hero Image --}}
                @if($news->image)
                    <div class="w-full h-80 relative">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                            class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                @endif

                <div class="p-8 md:p-12">

                    {{-- Meta Data --}}
                    <div class="flex items-center justify-between mb-6">
                        @if($news->published_at)
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                {{ $news->published_at->format('d F Y') }}
                            </span>
                        @endif
                    </div>

                    {{-- Title --}}
                    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-8 leading-tight">
                        {{ $news->title }}
                    </h1>

                    {{-- Content --}}
                    <div class="prose prose-lg text-gray-700 max-w-none">
                        {!! nl2br(e($news->content)) !!}
                    </div>

                </div>
            </article>

            {{-- Comments Section --}}
            <div class="mt-12 max-w-4xl mx-auto">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Reacties ({{ $news->comments->count() }})</h3>

                {{-- List Comments --}}
                <div class="space-y-6 mb-10">
                    @forelse($news->comments as $comment)
                        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                            <div class="flex justify-between items-start">
                                <div class="flex items-center mb-2">
                                    <div class="font-semibold text-gray-900 mr-2">{{ $comment->user->name }}</div>
                                    <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                @if(auth()->id() === $comment->user_id || auth()->check() && auth()->user()->is_admin)
                                    <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                                        onsubmit="return confirm('Weet je het zeker?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Verwijderen</button>
                                    </form>
                                @endif
                            </div>
                            <p class="text-gray-700 whitespace-pre-line">{{ $comment->content }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500 italic">Er zijn nog geen reacties geplaatst.</p>
                    @endforelse
                </div>

                {{-- Comment Form --}}
                @auth
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h4 class="text-lg font-semibold mb-4">Plaats een reactie</h4>
                        <form action="{{ route('comments.store', $news) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <textarea name="content" rows="4"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Schrijf hier je reactie..." required></textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow transition">
                                    Plaats Reactie
                                </button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="bg-blue-50 p-6 rounded-lg text-center">
                        <p class="text-blue-800">
                            <a href="{{ route('login') }}" class="font-bold underline hover:text-blue-900">Log in</a> om een
                            reactie te plaatsen.
                        </p>
                    </div>
                @endauth
            </div>

        </div>
    </div>
@endsection